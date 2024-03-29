<?php

namespace App\Http\Controllers\Back;

use Illuminate\Http\Request;
use App\Models\Htb;

class LuckyController extends \App\Http\Controllers\Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $totalLucky = Htb::where('lucky_no','=','1')->get();
        return view('luckys.index',['luckys'=>$totalLucky]);
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

            alert()->error('ID Not Found', 'Oops!');

            return redirect()->back();
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

        if (request()->win_name) {
           $winname = Htb::where('lucky_no','=', $luckyNo)->update(['win_name'=> request()->win_name]);
        }

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
        $win_name = Htb::where('lucky_no',$luckyNo)->first();
        if($win_name == null){

            $win_name = "None";
        } else {
            $win_name = $win_name->win_name;
        }

        $total = [];
        $total['number'] = $luckyNo;
        $total['winname'] = $win_name;
        $total['amount'] = Htb::where('lucky_no','=',$luckyNo)
            ->sum('amount');
        $total['mtl_value'] = Htb::where('lucky_no','=',$luckyNo)
            ->sum('mtl_vaule');
        $total['mtl_amount'] = $total['amount'] + $total['mtl_value'];

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
