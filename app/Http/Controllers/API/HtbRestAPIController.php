<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateHtbRestAPIRequest;
use App\Http\Requests\API\UpdateHtbRestAPIRequest;
use App\Models\HtbRest;
use App\Repositories\HtbRestRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class HtbRestController
 * @package App\Http\Controllers\API
 */

class HtbRestAPIController extends AppBaseController
{
    /** @var  HtbRestRepository */
    private $htbRestRepository;

    public function __construct(HtbRestRepository $htbRestRepo)
    {
        $this->htbRestRepository = $htbRestRepo;
    }

    /**
     * Display a listing of the HtbRest.
     * GET|HEAD /htbRests
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->htbRestRepository->pushCriteria(new RequestCriteria($request));
        $this->htbRestRepository->pushCriteria(new LimitOffsetCriteria($request));
        $htbRests = $this->htbRestRepository->all();

        return $this->sendResponse($htbRests->toArray(), 'Htb Rests retrieved successfully');
    }

    /**
     * Store a newly created HtbRest in storage.
     * POST /htbRests
     *
     * @param CreateHtbRestAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateHtbRestAPIRequest $request)
    {
        $input = $request->all();

        $htbRests = $this->htbRestRepository->create($input);

        return $this->sendResponse($htbRests->toArray(), 'Htb Rest saved successfully');
    }

    /**
     * Display the specified HtbRest.
     * GET|HEAD /htbRests/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var HtbRest $htbRest */
        $htbRest = $this->htbRestRepository->findWithoutFail($id);

        if (empty($htbRest)) {
            return $this->sendError('Htb Rest not found');
        }

        return $this->sendResponse($htbRest->toArray(), 'Htb Rest retrieved successfully');
    }

    /**
     * Update the specified HtbRest in storage.
     * PUT/PATCH /htbRests/{id}
     *
     * @param  int $id
     * @param UpdateHtbRestAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateHtbRestAPIRequest $request)
    {
        $input = $request->all();

        /** @var HtbRest $htbRest */
        $htbRest = $this->htbRestRepository->findWithoutFail($id);

        if (empty($htbRest)) {
            return $this->sendError('Htb Rest not found');
        }

        $htbRest = $this->htbRestRepository->update($input, $id);

        return $this->sendResponse($htbRest->toArray(), 'HtbRest updated successfully');
    }

    /**
     * Remove the specified HtbRest from storage.
     * DELETE /htbRests/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var HtbRest $htbRest */
        $htbRest = $this->htbRestRepository->findWithoutFail($id);

        if (empty($htbRest)) {
            return $this->sendError('Htb Rest not found');
        }

        $htbRest->delete();

        return $this->sendResponse($id, 'Htb Rest deleted successfully');
    }
}
