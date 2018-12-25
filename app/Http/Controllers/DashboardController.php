<?php

namespace App\Http\Controllers;

use App\Models\Domain;
use App\Models\Project;
use Illuminate\Http\Request;
use Khill\Lavacharts\Lavacharts;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id = null)
    {
        $lava = new Lavacharts();
        $date_yearmonth = date('Y-m');

        $application = Domain::find(1);
        $apptoArr = $application->projectStatuses->toArray();
        $appColl = collect($apptoArr);
        $appColl = $appColl->filter(function ($apptoArr ) use ($date_yearmonth) {
                        return false !== stristr($apptoArr['created_at'], $date_yearmonth);
                    });
        $appChart = $lava->DataTable();
        $appChart->addStringColumn('Reasons')
            ->addNumberColumn('Percent')
            ->addRow(['WIP', $appColl->where('status','WIP')->count()])
            ->addRow(['Pending', $appColl->where('status','Pending')->count()])
            ->addRow(['Todo', $appColl->where('status','Todo')->count()])
            ->addRow(['Done', $appColl->where('status','Done')->count()]);

        $lava->DonutChart('Application', $appChart, [
            'title' => $application['name']
        ]);

        $infrastructure = Domain::find(2);
        $infColl = $infrastructure->projectStatuses->toArray();
        $infColl = collect($infColl);
        $infChart = $lava->DataTable();
        $infChart->addStringColumn('Response')
            ->addNumberColumn('Percent')
            ->addRow(['WIP', $infColl->where('status','WIP')->count()])
            ->addRow(['Pending', $infColl->where('status','Pending')->count()])
            ->addRow(['Todo', $infColl->where('status','Todo')->count()])
            ->addRow(['Done', $infColl->where('status','Done')->count()]);

        $lava->DonutChart('Infrastructure', $infChart, [
            'title' => $infrastructure['name']
        ]);

        $support = Domain::find(3);
        $suppColl = $support->projectStatuses->toArray();
        $suppColl = collect($suppColl);
        $SuppChart = $lava->DataTable();
        $SuppChart->addStringColumn('Response')
            ->addNumberColumn('Percent')
            ->addRow(['WIP', $suppColl->where('status','WIP')->count()])
            ->addRow(['Pending', $suppColl->where('status','Pending')->count()])
            ->addRow(['Todo', $suppColl->where('status','Todo')->count()])
            ->addRow(['Done', $suppColl->where('status','Done')->count()]);

        $lava->DonutChart('Support', $SuppChart, [
            'title' => $support['name']
        ]);

        $admin = Domain::find(4);
        $adminColl = $admin->projectStatuses->toArray();
        $adminColl = collect($adminColl);
        $adminChart = $lava->DataTable();
        $adminChart->addStringColumn('Response')
            ->addNumberColumn('Percent')
            ->addRow(['WIP', $adminColl->where('status','WIP')->count()])
            ->addRow(['Pending', $adminColl->where('status','Pending')->count()])
            ->addRow(['Todo', $adminColl->where('status','Todo')->count()])
            ->addRow(['Done', $adminColl->where('status','Done')->count()]);

        $lava->DonutChart('Admin', $adminChart, [
            'title' => $admin['name']
        ]);

        // $cri = Domain::find(4);
        // $cricoll = $cri->projectStatuses->toArray();

        // $t = collect($cricoll);

        // $asdf = $t->filter(function ($cricoll) use ($d) {
        //         return false !== stristr($cricoll['created_at'], $d);
        //     });

        // dd($asdf);


        return view('dashboard.index',['lava' => $lava]);

        // $votes  = $lava->DataTable();
        // $wip = Project::where('status','WIP')->count();
        // $Pending = Project::where('status','Pending')->count();
        // $todo = Project::where('status','Todo')->count();
        // $done = Project::where('status','Done')->count();
        // $votes->addStringColumn('Status')
        //       ->addNumberColumn('Votes')
        //       ->addRow(['WIP',  $wip])
        //       ->addRow(['Pending',  $Pending])
        //       ->addRow(['Todo',  $todo])
        //       ->addRow(['done', $done]);
        // $lava->BarChart('Votes', $votes);

        if($id){

            $domain = Domain::find($id);
            $ho = $domain->projectStatuses->toArray();
            $hocoll = collect($ho);

            $group = $lava->DataTable();
            $group->addStringColumn('Reasons')
                ->addNumberColumn('Percent')
                ->addRow(['WIP', $hocoll->where('status','WIP')->count()])
                ->addRow(['Pending', $hocoll->where('status','Pending')->count()])
                ->addRow(['Todo', $hocoll->where('status','Todo')->count()])
                ->addRow(['Done', $hocoll->where('status','Done')->count()]);

            $lava->DonutChart('IMDB', $group, [
                'title' => $domain['name']
            ]);

            $proChart = $lava->DataTable();
            $proChart->addStringColumn('Reasons')
                ->addNumberColumn('Percent')
                ->addRow(['Critical', $hocoll->where('priority_level','1.Critical')->count()])
                ->addRow(['Height', $hocoll->where('priority_level','2.Height')->count()])
                ->addRow(['Med',$hocoll->where('priority_level','3.Med')->count()])
                ->addRow(['Low',$hocoll->where('priority_level','4.Low')->count()]);

            $lava->DonutChart('Priority', $proChart, [
                'title' => $domain['name']
            ]);

            return view('dashboard.index',['lava' => $lava,'dname' => $domain['name']]);

        } else {

            $date = date('Y-m');
            $hocoll = Project::where('created_at', 'Like','%'.$date.'%')->get();
            $group = $lava->DataTable();            
            $group->addStringColumn('Reasons')
                ->addNumberColumn('Percent')
                ->addRow(['WIP', $hocoll->where('status','WIP')->count()])
                ->addRow(['Pending', $hocoll->where('status','Pending')->count()])
                ->addRow(['Todo', $hocoll->where('status','Todo')->count()])
                ->addRow(['Done', $hocoll->where('status','Done')->count()]);

            $lava->DonutChart('IMDB', $group, [
                // 'title' => $domain['name']
            ]);

            $proChart = $lava->DataTable();
            $proChart->addStringColumn('Reasons')
                ->addNumberColumn('Percent')
                ->addRow(['Critical', $hocoll->where('priority_level','1.Critical')->count()])
                ->addRow(['Height', $hocoll->where('priority_level','2.Height')->count()])
                ->addRow(['Med',$hocoll->where('priority_level','3.Med')->count()])
                ->addRow(['Low',$hocoll->where('priority_level','4.Low')->count()]);
            $lava->DonutChart('Priority', $proChart, [
                // 'title' => $domain['name']
            ]);

        }

        return view('dashboard.index',['lava' => $lava]);
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
