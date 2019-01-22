<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Htb;

class LuckyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $totalLucky = Htb::where('lucky_no','=','1')->get();
        // return view('luckys.index',['luckys'=>$totalLucky]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $htb = Htb::find(request()->id);

        if (empty($htb)) {
            Flash::error('Htb not found');

            return redirect(route('htbs.index'));
        }

        return view('luckys.edit')->with('htb', $htb);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function showPrint()
    {
        $luckyNo = request()->lucky_no;

        $lucky = Htb::where('lucky_no','=',$luckyNo)->get();

        $filename = $this->printPdf($lucky,$luckyNo);

        return view('luckys.index',[ 'filename' => $filename]);
    }

    public function printPdf($lucky,$luckyNo)
    {
        $pdf = new LMYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Kophyo');
        $pdf->SetTitle('Lucky');
        $pdf->SetSubject('invoice');
        $pdf->SetKeywords('TCPDF, PDF, example, test, guide');  

        $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 006', PDF_HEADER_STRING);

        $pdf->SetMargins(30, 20, 10, true);
        $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);

        // Set font
        $fontname = \TCPDF_FONTS::addTTFfont('fonts/Zawgyi-One.ttf', 'TrueTypeUnicode','', 96);
        $pdf->SetFont($fontname, '', 11, '', false);

        $total = [];
        $total['number'] = $luckyNo;
        $total['amount'] = Htb::where('lucky_no','=',$luckyNo)
            ->sum('amount');
        $total['mtl_value'] = Htb::where('lucky_no','=',$luckyNo)
            ->sum('mtl_vaule');

        $view = view('luckys.print',['luckys' => $lucky,'total' => $total]);
        $html = $view->render();
        $pdf->AddPage();        
        $pdf->writeHTML($html);
        
        $filelocation = public_path('luckyinvoice/');
        $filename = $luckyNo . date('Y_m_i_s') .'.pdf';
        $pdf->Output($filelocation . $filename ,'F');
        
        return $filename;

    }
}

class LMYPDF extends \TCPDF {

    //Page header
    public function Header() {
        
        // Set font
        $fontname = \TCPDF_FONTS::addTTFfont('fonts/Zawgyi-One.ttf', 'TrueTypeUnicode','', 96);
        $this->SetFont($fontname, '', 12, '', false);
        $this->SetY(8);
        $this->writeHtml('<h1 style="text-align:center;line-height:2;">အဝင္(___)</h1><br>');
    }

}
