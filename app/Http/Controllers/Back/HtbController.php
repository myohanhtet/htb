<?php

namespace App\Http\Controllers\Back;

use App\DataTables\HtbDataTable;
use App\Http\Controllers\AppBaseController;
use App\Http\Requests\CreateHtbRequest;
use App\Http\Requests\UpdateHtbRequest;
use App\Models\Htb;
use App\Models\Doner;
use App\Models\Setting;
use App\Repositories\HtbRepository;
use Illuminate\Http\Request;
use Flash;
use Response;
use \PDF;

class HtbController extends AppBaseController
{
    /** @var  HtbRepository */
    private $htbRepository;

    public function __construct(HtbRepository $htbRepo)
    {
        $this->htbRepository = $htbRepo;
        $this->middleware('permission:view-master-data');
        $this->middleware('permission:create-master-data',['only'=>['create','store']]);
        $this->middleware('permission:edit-master-data',['only'=>['edit','update']]);
        $this->middleware('permission:delete-master-data',['only'=> ['destroy']]);
    }

    /**
     * Display a listing of the Htb.
     *
     * @param HtbDataTable $htbDataTable
     * @return Response
     */
    public function index(HtbDataTable $htbDataTable)
    {
        return $htbDataTable->render('htbs.index');
    }

    /**
     * Show the form for creating a new Htb.
     *
     * @return Response
     */
    public function create()
    {
        return view('htbs.create');
    }

    /**
     * Store a newly created Htb in storage.
     *
     * @param CreateHtbRequest $request
     *
     * @return Response
     */
    public function store(CreateHtbRequest $request)
    {
        $input = $request->all();

        $mya_en = Config('mmconverter.number.mya_en');

        $input['lucky_no'] =($input['lucky_no'] == null ? null : strtr($input['lucky_no'],$mya_en));

        $input['amount'] = ($input['amount'] == null ? null : strtr($input['amount'],$mya_en) );
        $input['mtl_vaule'] = ($input['mtl_vaule'] == null ? null : strtr($input['mtl_vaule'],$mya_en) );
        $input['user_id'] = auth()->user()->id;
        $htb = $this->htbRepository->create($input);


        $filename = $this->printPdf($htb->id);

        Flash::success('Htb saved successfully.');

        return view('htbs.print_view',['filename' => $filename, 'htb' =>$htb]);
    }

    /**
     * Display the specified Htb.
     *
     * @param  int $id
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View|Response
     */
    public function show($id)
    {
        $htb = $this->htbRepository->find($id);

        $pdf = PDF::loadView('htbs.test', ['htb'=> $htb]);

        if (empty($htb)) {
            Flash::error('Htb not found');

            return redirect(route('htbs.index'));
        }

        $filename = $this->printPdf($htb->id);

        return view('htbs.print_view',['filename'=> $filename ,'htb'=> $htb]);
    }

    /**
     * Show the form for editing the specified Htb.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $htb = $this->htbRepository->find($id);

        if (empty($htb)) {
            Flash::error('Htb not found');

            return redirect(route('htbs.index'));
        }

        return view('htbs.edit')->with('htb', $htb);
    }

    /**
     * Update the specified Htb in storage.
     *
     * @param  int              $id
     * @param UpdateHtbRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateHtbRequest $request)
    {
        $htb = $this->htbRepository->find($id);

        if (empty($htb)) {
            Flash::error('Htb not found');

            return redirect(route('htbs.index'));
        }

        $htb = $this->htbRepository->update($request->all(), $id);

        Flash::success('Htb updated successfully.');

        $filename = $this->printPdf($htb->id);

        return view('htbs.print_view',['filename'=> $filename ,'htb'=> $htb]);
    }

    /**
     * Remove the specified Htb from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $htb = $this->htbRepository->find($id);

        if (empty($htb)) {
            Flash::error('Htb not found');

            return redirect(route('htbs.index'));
        }

        $this->htbRepository->delete($id);

        Flash::success('Htb deleted successfully.');

        return redirect(route('htbs.index'));
    }

        /**

     * Show the form for creating a new resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function mtlautocomplete(Request $request)

    {
            $search = $request->get('term');

          $result = Htb::where('mtl', 'LIKE', '%'. $search. '%')->get();

          return response()->json($result);

    }

       /**

     * Show the form for creating a new resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function donarautocomplete(Request $request)

    {
            $search = $request->get('term');

          $result = Doner::where('name', 'LIKE', '%'. $search. '%')->get();

          return response()->json($result);

    }

       /**

     * Show the form for creating a new resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function addressautocomplete(Request $request)

    {
            $search = $request->get('term');

          $result = Doner::where('address', 'LIKE', '%'. $search. '%')->get();

          return response()->json($result);

    }

    public function printPdf($id)
    {
        $bill = Htb::find($id);

        $bill['mtl'] = uni2zg($bill['mtl']);
        $bill['donar'] = uni2zg($bill['donar']);
        $bill['address'] = uni2zg($bill['address']);
        $pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
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
        $view = view('htbs.print')->with('bill', $bill);
        $html = $view->render();
        $pdf->AddPage();
        $pdf->writeHTML($html);

        $filelocation = public_path('invoice/');
        $filename = $bill['id'].'_'. date('Y_m_i_s') .'.pdf';
        $pdf->Output($filelocation . $filename ,'F');

        return $filename;

    }
}


class MYPDF extends \TCPDF {

    //Page header
    public function Header() {
        $ui_config = Setting::pluck('value','name');
        // Set font
        $fontname = \TCPDF_FONTS::addTTFfont('fonts/Zawgyi-One.ttf', 'TrueTypeUnicode','', 96);
        $this->SetFont($fontname, '', 12, '', false);
        $this->SetY(8);
        $this->writeHtml('<span style="text-align:center;line-height:2;">'.($ui_config['invoice-title-one'] == null ? "Invoice Title One": uni2zg($ui_config['invoice-title-one']) ).'<br>
'.($ui_config['invoice-title-two'] == null ? "Invoice Title Two": uni2zg($ui_config['invoice-title-two'])).'<br>
'.($ui_config['invoice-title-three'] == null ? "Invoice title Three": uni2zg($ui_config['invoice-title-three'])).'</span><br>');
    }

}

