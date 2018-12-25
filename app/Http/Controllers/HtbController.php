<?php

namespace App\Http\Controllers;

use App\DataTables\HtbDataTable;
use App\Http\Controllers\AppBaseController;
use App\Http\Requests;
use App\Http\Requests\CreateHtbRequest;
use App\Http\Requests\UpdateHtbRequest;
use App\Models\Htb;
use App\Repositories\HtbRepository;
use Flash;
use Response;

class HtbController extends AppBaseController
{
    /** @var  HtbRepository */
    private $htbRepository;

    public function __construct(HtbRepository $htbRepo)
    {
        $this->htbRepository = $htbRepo;
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

        $htb = $this->htbRepository->create($input);

        $filename = $this->printPdf($htb->id);

        Flash::success('Htb saved successfully.');

        // return redirect(route('htbs.index'));
        return view('htbs.print_view',['filename' => $filename, 'htb' =>$htb])->with('filename',$filename);
    }

    /**
     * Display the specified Htb.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $htb = $this->htbRepository->findWithoutFail($id);

        if (empty($htb)) {
            Flash::error('Htb not found');

            return redirect(route('htbs.index'));
        }
        $filename = $this->printPdf($htb->id);

        // return view('htbs.show')->with('htb', $htb);
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
        $htb = $this->htbRepository->findWithoutFail($id);

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
        $htb = $this->htbRepository->findWithoutFail($id);

        if (empty($htb)) {
            Flash::error('Htb not found');

            return redirect(route('htbs.index'));
        }

        $htb = $this->htbRepository->update($request->all(), $id);

        Flash::success('Htb updated successfully.');

        // return redirect(route('htbs.index'));
        $filename = $this->printPdf($htb->id);

        // return view('htbs.show')->with('htb', $htb);
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
        $htb = $this->htbRepository->findWithoutFail($id);

        if (empty($htb)) {
            Flash::error('Htb not found');

            return redirect(route('htbs.index'));
        }

        $this->htbRepository->delete($id);

        Flash::success('Htb deleted successfully.');

        return redirect(route('htbs.index'));
    }

    public function printPdf($id)
    {

        $pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Nicola Asuni');
        $pdf->SetTitle('TCPDF Example 006');
        $pdf->SetSubject('TCPDF Tutorial');
        $pdf->SetKeywords('TCPDF, PDF, example, test, guide');  

        $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 006', PDF_HEADER_STRING);

        $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);

        // Set font
        $fontname = \TCPDF_FONTS::addTTFfont('fonts/Zawgyi-One.ttf', 'TrueTypeUnicode','', 96);
        $pdf->SetFont($fontname, '', 11, '', false);

        $bill = Htb::find($id);
        $view = view('htbs.print')->with('bill', $bill);
        $html = $view->render();
        $pdf->AddPage();        
        $pdf->writeHTML($html);
        
        //$pdf->Output('example_006.pdf', 'I');
        
        $filelocation = public_path('invoice/');
        $filename = $bill['id'].'_'. date('Y_m_i_s') .'.pdf';
        $pdf->Output($filelocation . $filename ,'F');
        
        return $filename;

    }
}


class MYPDF extends \TCPDF {

    //Page header
    public function Header() {
        
        // Set font
        $fontname = \TCPDF_FONTS::addTTFfont('fonts/Zawgyi-One.ttf', 'TrueTypeUnicode','', 96);
        $this->SetFont($fontname, '', 12, '', false);
        $this->SetY(8);
        $this->writeHtml('<span style="text-align:center;line-height:2;">ရန္ကုန္တိုင္းေဒသႀကီး၊ ကမာ႐ြတ္ၿမိဳ႔နယ္၊ ထန္းတပင္ေက်ာင္းတိုက္<br>
ကိုးန၀င္းကပ္ေက်ာ္သိမ္ဦးေစတီေတာ္၊ (၁၀၃)ႀကိမ္ေျမာက္ ဗုဒၶပူဇနိယပြဲေတာ္<br>
စာေရးတံမဲ, ေလာင္းလွဴပူေဇာ္ပြဲ၊ စာေရးတံမဲ လက္ခံျဖတ္ပိုင္း</span><br>');
    }

}
