<?php

namespace App\Http\Controllers\Back;

use Flash;
use Response;
use App\Http\Requests;
use App\Imports\DonerImport;
use App\DataTables\DonerDataTable;
use Maatwebsite\Excel\Facades\Excel;
use App\Repositories\DonerRepository;
use App\Http\Requests\CreateDonerRequest;
use App\Http\Requests\UpdateDonerRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\Doner;
use Symfony\Component\HttpFoundation\Request;

class DonerController extends AppBaseController
{
    /** @var  DonerRepository */
    private $donerRepository;

    public function __construct(DonerRepository $donerRepo)
    {
        $this->donerRepository = $donerRepo;
        $this->middleware('permission:view-donar');
        $this->middleware('permission:create-donar',['only'=>['create','store']]);
        $this->middleware('permission:edit-donar',['only'=>['edit','update']]);
        $this->middleware('permission:delete-donar',['only'=> ['destory']]);
    }

    /**
     * Display a listing of the Doner.
     *
     * @param DonerDataTable $donerDataTable
     * @return Response
     */
    public function index(DonerDataTable $donerDataTable)
    {
        return $donerDataTable->render('doners.index');
    }

    /**
     * Show the form for creating a new Doner.
     *
     * @return Response
     */
    public function create()
    {
        return view('doners.create');
    }

    /**
     * Store a newly created Doner in storage.
     *
     * @param CreateDonerRequest $request
     *
     * @return Response
     */
    public function store(CreateDonerRequest $request)
    {
        $input = $request->all();

        $doner = $this->donerRepository->create($input);

        Flash::success('Doner saved successfully.');

        return redirect(route('doners.index'));
    }

    /**
     * Display the specified Doner.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $doner = $this->donerRepository->findWithoutFail($id);

        if (empty($doner)) {
            Flash::error('Doner not found');

            return redirect(route('doners.index'));
        }

        return view('doners.show')->with('doner', $doner);
    }

    /**
     * Show the form for editing the specified Doner.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $doner = $this->donerRepository->findWithoutFail($id);

        if (empty($doner)) {
            Flash::error('Doner not found');

            return redirect(route('doners.index'));
        }

        return view('doners.edit')->with('doner', $doner);
    }

    /**
     * Update the specified Doner in storage.
     *
     * @param  int              $id
     * @param UpdateDonerRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDonerRequest $request)
    {
        $doner = $this->donerRepository->findWithoutFail($id);

        if (empty($doner)) {
            Flash::error('Doner not found');

            return redirect(route('doners.index'));
        }

        $doner = $this->donerRepository->update($request->all(), $id);

        Flash::success('Doner updated successfully.');

        return redirect(route('doners.index'));
    }

    /**
     * Remove the specified Doner from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $doner = $this->donerRepository->findWithoutFail($id);

        if (empty($doner)) {
            Flash::error('Doner not found');

            return redirect(route('doners.index'));
        }

        $this->donerRepository->delete($id);

        Flash::success('Doner deleted successfully.');

        return redirect(route('doners.index'));
    }

    public function upload(Request $request)
    {
    
            if ($request->hasFile('donerlist')) {
                Excel::import(new DonerImport,$request->file('donerlist'));
                return redirect()->back();
            }
            
    }
}
