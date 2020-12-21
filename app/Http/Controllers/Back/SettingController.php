<?php

namespace App\Http\Controllers\Back;

use App\DataTables\SettingDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateSettingRequest;
use App\Http\Requests\UpdateSettingRequest;
use App\Repositories\SettingRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Illuminate\Support\Facades\Hash;
use App\Models\Doner;
use App\Models\Htb;
use App\Models\Pathan;
use Response;

class SettingController extends AppBaseController
{
    /** @var  SettingRepository */
    private $settingRepository;

    public function __construct(SettingRepository $settingRepo)
    {
        $this->settingRepository = $settingRepo;
        $this->middleware('permission:view-setting');
        $this->middleware('permission:create-setting',['only'=>['create','store']]);
        $this->middleware('permission:edid-setting',['only'=>['edit','update']]);
        $this->middleware('permission:delete-setting',['only'=> ['destory']]);
    }

    /**
     * Display a listing of the Setting.
     *
     * @param SettingDataTable $settingDataTable
     * @return Response
     */
    public function index(SettingDataTable $settingDataTable)
    {
        return $settingDataTable->render('settings.index');
    }

    /**
     * Show the form for creating a new Setting.
     *
     * @return Response
     */
    public function create()
    {
        return view('settings.create');
    }

    /**
     * Store a newly created Setting in storage.
     *
     * @param CreateSettingRequest $request
     *
     * @return Response
     */
    public function store(CreateSettingRequest $request)
    {
        $input = $request->all();

        $setting = $this->settingRepository->create($input);

        Flash::success('Setting saved successfully.');

        return redirect(route('settings.index'));
    }

    /**
     * Display the specified Setting.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $setting = $this->settingRepository->find($id);

        if (empty($setting)) {
            Flash::error('Setting not found');

            return redirect(route('settings.index'));
        }

        return view('settings.show')->with('setting', $setting);
    }

    /**
     * Show the form for editing the specified Setting.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $setting = $this->settingRepository->find($id);

        if (empty($setting)) {
            Flash::error('Setting not found');

            return redirect(route('settings.index'));
        }

        return view('settings.edit')->with('setting', $setting);
    }

    /**
     * Update the specified Setting in storage.
     *
     * @param  int              $id
     * @param UpdateSettingRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSettingRequest $request)
    {
        $setting = $this->settingRepository->find($id);

        if (empty($setting)) {
            Flash::error('Setting not found');

            return redirect(route('settings.index'));
        }

        $setting = $this->settingRepository->update($request->all(), $id);

        Flash::success('Setting updated successfully.');

        return redirect(route('settings.index'));
    }

    /**
     * Remove the specified Setting from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $setting = $this->settingRepository->find($id);

        if (empty($setting)) {
            Flash::error('Setting not found');

            return redirect(route('settings.index'));
        }

        $this->settingRepository->delete($id);

        Flash::success('Setting deleted successfully.');

        return redirect(route('settings.index'));
    }

    public function truncate()
    {
        if (!Hash::check(request()->password,auth()->user()->password)) {
            alert()->warning('Incorrect password!','Error');
            return redirect(route('settings.index'));
        }

        if (!request()->masterdata && !request()->donarlist && !request()->pathan ) {

            alert()->error('Please tick this checkbox if you want to truncate tabe','Error');

            return redirect(route('settings.index'));
        }
        
        $message = "";

        if(request()->masterdata) {
            Htb::truncate();
            $message .= "Master data deleted. ";
        }
        
        if(request()->donarlist) {
            Doner::truncate();
            $message .= "Doner list deleted. ";
        }
        
        if(request()->pathan) {
            Pathan::truncate();
            $message .= "Pathan data deleted. ";
        }

        alert()->success($message);
        return redirect(route('settings.index'));
    }
}
