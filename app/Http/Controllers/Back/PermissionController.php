<?php

namespace App\Http\Controllers\Back;

use App\DataTables\PermissionDataTable;
use App\Http\Requests;
use App\Http\Requests\CreatePermissionRequest;
use App\Http\Requests\UpdatePermissionRequest;
use App\Repositories\PermissionRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use App\Models\Role;
use Response;
use Spatie\Permission\Models\Permission;

class PermissionController extends AppBaseController
{
    /** @var  PermissionRepository */
    private $permissionRepository;

    public function __construct(PermissionRepository $permissionRepo)
    {
        $this->permissionRepository = $permissionRepo;
        $this->roleName = Role::pluck('name','id'); 
        $this->middleware('permission:view-permission');
        $this->middleware('permission:create-permission',['only'=>['create','store']]);
        $this->middleware('permission:edid-permission',['only'=>['edit','update']]);
        $this->middleware('permission:delete-permission',['only'=> ['destory']]);
    }

    /**
     * Display a listing of the Permission.
     *
     * @param PermissionDataTable $permissionDataTable
     * @return Response
     */
    public function index(PermissionDataTable $permissionDataTable)
    {
        return $permissionDataTable->render('permissions.index');
    }

    /**
     * Show the form for creating a new Permission.
     *
     * @return Response
     */
    public function create()
    {
        return view('permissions.create',['roles'=>$this->roleName]);
    }

    /**
     * Store a newly created Permission in storage.
     *
     * @param CreatePermissionRequest $request
     *
     * @return Response
     */
    public function store(CreatePermissionRequest $request)
    {
        // $input = $request->all();
        // $permission = $this->permissionRepository->create($input);

        $permission = new Permission();
        $permission->name = $request->name;
        $permission->guard_name = $request->guard_name;
        $permission->save();
        $permission->syncRoles(array_keys($request->roles));

        Flash::success('Permission saved successfully.');

        return redirect(route('permissions.index'));
    }

    /**
     * Display the specified Permission.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $permission = $this->permissionRepository->findWithoutFail($id);

        if (empty($permission)) {

            Flash::error('Permission not found');
            return redirect(route('permissions.index'));

        }

        return view('permissions.show',['permission'=>$permission,'roles'=>$this->roleName]);
    }

    /**
     * Show the form for editing the specified Permission.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $permission = $this->permissionRepository->findWithoutFail($id);

        if (empty($permission)) {

            Flash::error('Permission not found');

            return redirect(route('permissions.index'));
        }

        return view('permissions.edit')->with('permission', $permission);
    }

    /**
     * Update the specified Permission in storage.
     *
     * @param  int              $id
     * @param UpdatePermissionRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePermissionRequest $request)
    {
        $permission = Permission::findById($id);

        if (empty($permission)) {
            Flash::error('Permission not found');

            return redirect(route('permissions.index'));
        }

        $permission->name = $request->name;
        $permission->guard_name = $request->guard_name;
        $permission->update();
        
        $permission->syncRoles(array_keys($request->roles));

        Flash::success('Permission updated successfully.');

        return redirect(route('permissions.index'));
    }

    /**
     * Remove the specified Permission from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $permission = $this->permissionRepository->findWithoutFail($id);

        if (empty($permission)) {
            Flash::error('Permission not found');

            return redirect(route('permissions.index'));
        }

        $this->permissionRepository->delete($id);

        Flash::success('Permission deleted successfully.');

        return redirect(route('permissions.index'));
    }
}
