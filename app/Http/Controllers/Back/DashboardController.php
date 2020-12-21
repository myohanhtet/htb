<?php

namespace App\Http\Controllers\Back;

use Illuminate\Http\Request;
use App\Models\Htb;
use App\Models\Pathan;

class DashboardController extends \App\Http\Controllers\Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sumData = [];

        $sumData['value'] = Htb::sum('amount');
        $sumData['mtlvalue'] = Htb::sum('mtl_vaule');
        $sumData['totalvalue'] = $sumData['value'] + $sumData['mtlvalue'];
        $sumData['totaldonar'] = Htb::count();

        $pathan['value'] = Pathan::sum('amount');
        $pathan['mtlvalue'] = Pathan::sum('amount_mtl');
        $pathan['totalvalue'] = $pathan['value'] + $pathan['mtlvalue'];
        $pathan['totaldonar'] = pathan::count();

        return view('dashboard.index',['sumData' => $sumData,'pathan'=>$pathan]);
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
    public function edit($id)
    {
        //
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
}
