<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Htb;
use App\Models\Pathan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index()
    {
        $sumData = [];
        $sumData['value'] = DB::table('htb')->sum('amount');
        $sumData['mtlvalue'] = DB::table('htb')->sum('mtl_vaule');
        $sumData['totalvalue'] = $sumData['value'] + $sumData['mtlvalue'];
        $sumData['totaldonar'] = Htb::count();
        $pathan['value'] = DB::table('pathan')->sum('amount');
        $pathan['mtlvalue'] = DB::table('pathan')->sum('amount_mtl');
        $pathan['totalvalue'] = $pathan['value'] + $pathan['mtlvalue'];
        $pathan['totaldonar'] = pathan::count();

         return view('frontend.home.index',['sumData' => $sumData,'pathan'=>$pathan]);
//        if(auth()->user()->hasRole('pathan role')) return redirect()->route('pathans.create');
//
//        return redirect()->route('htbs.create');

    }

    public function donor(){
        $donors = Htb::latest()->paginate(20);
        return view('frontend.home.donor',['donors' => $donors]);
    }

    public function search(Request $request){
        $search = $request->input('name');
        $donors = Htb::query()
            ->where('donar', 'LIKE', "%{$search}%")
            ->orWhere('address', 'LIKE', "%{$search}%")
            ->paginate(10);

        return view('frontend.home.donor',['donors' => $donors]);
    }
}
