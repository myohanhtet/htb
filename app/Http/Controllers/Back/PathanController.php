<?php

namespace App\Http\Controllers\Back;

use App\DataTables\PathanDataTable;
use App\Http\Requests;
use App\Http\Requests\CreatePathanRequest;
use App\Http\Requests\UpdatePathanRequest;
use App\Repositories\PathanRepository;
use App\Models\Pathan;
use App\Models\Setting;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class PathanController extends AppBaseController
{
    /** @var  PathanRepository */
    private $pathanRepository;

    public function __construct(PathanRepository $pathanRepo)
    {
        $this->pathanRepository = $pathanRepo;
        $this->middleware('permission:view-pathan');
        $this->middleware('permission:create-pathan',['only'=>['create','store']]);
        $this->middleware('permission:edit-pathan',['only'=>['edit','update']]);
        $this->middleware('permission:delete-pathan',['only'=> ['destroy']]);
    }

    /**
     * Display a listing of the Pathan.
     *
     * @param PathanDataTable $pathanDataTable
     * @return Response
     */
    public function index(PathanDataTable $pathanDataTable)
    {
        return $pathanDataTable->render('pathans.index');
    }

    /**
     * Show the form for creating a new Pathan.
     *
     * @return Response
     */
    public function create()
    {
        return view('pathans.create');
    }

    /**
     * Store a newly created Pathan in storage.
     *
     * @param CreatePathanRequest $request
     *
     * @return Response
     */
    public function store(CreatePathanRequest $request)
    {
        $input = $request->all();

        $mya_en = Config('mmconverter.number.mya_en');

        $input['amount'] = ($input['amount'] == null ? null : strtr($input['amount'],$mya_en));
        $input['amount_mtl'] = ($input['amount_mtl'] == null ? null : strtr($input['amount_mtl'],$mya_en));
        $input['user_id'] = auth()->user()->id;
        $pathan = $this->pathanRepository->create($input);
        $filename = $this->printPdf($pathan->id);

        Flash::success('Pathan saved successfully.');

        return view('pathans.print_view',['filename' => $filename, 'pathans' =>$pathan]);
    }

    /**
     * Display the specified Pathan.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $pathan = $this->pathanRepository->findWithoutFail($id);

        if (empty($pathan)) {
            Flash::error('Pathan not found');

            return redirect(route('pathans.index'));
        }

        $filename = $this->printPdf($pathan->id);

        return view('pathans.print_view',['filename' => $filename, 'pathans' =>$pathan]);

        // return view('pathans.show')->with('pathan', $pathan);
    }

    /**
     * Show the form for editing the specified Pathan.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $pathan = $this->pathanRepository->findWithoutFail($id);

        if (empty($pathan)) {
            Flash::error('Pathan not found');

            return redirect(route('pathans.index'));
        }

        return view('pathans.edit')->with('pathan', $pathan);
    }

    /**
     * Update the specified Pathan in storage.
     *
     * @param  int              $id
     * @param UpdatePathanRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePathanRequest $request)
    {
        $pathan = $this->pathanRepository->findWithoutFail($id);

        if (empty($pathan)) {
            Flash::error('Pathan not found');

            return redirect(route('pathans.index'));
        }

        $pathan = $this->pathanRepository->update($request->all(), $id);

        $filename = $this->printPdf($pathan->id);

        Flash::success('Pathan updated successfully.');

        return view('pathans.print_view',['filename' => $filename, 'pathans' =>$pathan]);
    }

    /**
     * Remove the specified Pathan from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $pathan = $this->pathanRepository->findWithoutFail($id);

        if (empty($pathan)) {
            Flash::error('Pathan not found');

            return redirect(route('pathans.index'));
        }

        $this->pathanRepository->delete($id);

        Flash::success('Pathan deleted successfully.');

        return redirect(route('pathans.index'));
    }

    public function printPdf($id)
    {
        $bill = Pathan::find($id);

        $bill['material'] = uni2zg($bill['material']);
        $bill['doner'] = uni2zg($bill['doner']);
        $bill['address'] = uni2zg($bill['address']);
        
        $pdf = new PATHANPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Kophyo');
        $pdf->SetTitle('လက္ခံျဖတ္ပိုင္း');
        $pdf->SetSubject('invoice');
        $pdf->SetKeywords('TCPDF, PDF, example, test, guide');  

        $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 006', PDF_HEADER_STRING);

        $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);

        // Set font
        $fontname = \TCPDF_FONTS::addTTFfont('fonts/Zawgyi-One.ttf', 'TrueTypeUnicode','', 96);
        $pdf->SetFont($fontname, '', 11, '', false);
        $view = view('pathans.print')->with('bill', $bill);
        $html = $view->render();
        $pdf->AddPage();        
        $pdf->writeHTML($html);
        
        $filelocation = public_path('invoice/pathans/');
        $filename = $bill['id'].'_'. date('Y_m_i_s') .'.pdf';
        $pdf->Output($filelocation . $filename ,'F');
        
        return $filename;

    }
}

class PATHANPDF extends \TCPDF {

    //Page header
    public function Header() {
        $ui_config = Setting::pluck('value','name');
        // Set font
        $fontname = \TCPDF_FONTS::addTTFfont('fonts/Zawgyi-One.ttf', 'TrueTypeUnicode','', 96);
        $this->SetFont($fontname, '', 12, '', false);
        $this->SetY(8);
        $this->writeHtml('<span style="text-align:center;line-height:2;">'.($ui_config['pathan-invoice-title-one'] == null ? "Pathan Invoice Title One": uni2zg($ui_config['pathan-invoice-title-one']) ).'<br>
'.($ui_config['pathan-invoice-title-two'] == null ? "Pathan Invoice Title Two": uni2zg($ui_config['pathan-invoice-title-two'])).'<br>
'.($ui_config['pathan-invoice-title-three'] == null ? "Pathan Invoice title Three": uni2zg($ui_config['pathan-invoice-title-three'])).'</span><br>');
    }

}
