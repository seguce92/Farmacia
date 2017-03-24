<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateTcomprobanteAPIRequest;
use App\Http\Requests\API\UpdateTcomprobanteAPIRequest;
use App\Models\Tcomprobante;
use App\Repositories\TcomprobanteRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class TcomprobanteController
 * @package App\Http\Controllers\API
 */

class TcomprobanteAPIController extends AppBaseController
{
    /** @var  TcomprobanteRepository */
    private $tcomprobanteRepository;

    public function __construct(TcomprobanteRepository $tcomprobanteRepo)
    {
        $this->tcomprobanteRepository = $tcomprobanteRepo;
    }

    /**
     * Display a listing of the Tcomprobante.
     * GET|HEAD /tcomprobantes
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->tcomprobanteRepository->pushCriteria(new RequestCriteria($request));
        $this->tcomprobanteRepository->pushCriteria(new LimitOffsetCriteria($request));
        $tcomprobantes = $this->tcomprobanteRepository->all();

        return $this->sendResponse($tcomprobantes->toArray(), 'Tcomprobantes retrieved successfully');
    }

    /**
     * Store a newly created Tcomprobante in storage.
     * POST /tcomprobantes
     *
     * @param CreateTcomprobanteAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateTcomprobanteAPIRequest $request)
    {
        $input = $request->all();

        $tcomprobantes = $this->tcomprobanteRepository->create($input);

        return $this->sendResponse($tcomprobantes->toArray(), 'Tcomprobante saved successfully');
    }

    /**
     * Display the specified Tcomprobante.
     * GET|HEAD /tcomprobantes/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Tcomprobante $tcomprobante */
        $tcomprobante = $this->tcomprobanteRepository->findWithoutFail($id);

        if (empty($tcomprobante)) {
            return $this->sendError('Tcomprobante not found');
        }

        return $this->sendResponse($tcomprobante->toArray(), 'Tcomprobante retrieved successfully');
    }

    /**
     * Update the specified Tcomprobante in storage.
     * PUT/PATCH /tcomprobantes/{id}
     *
     * @param  int $id
     * @param UpdateTcomprobanteAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTcomprobanteAPIRequest $request)
    {
        $input = $request->all();

        /** @var Tcomprobante $tcomprobante */
        $tcomprobante = $this->tcomprobanteRepository->findWithoutFail($id);

        if (empty($tcomprobante)) {
            return $this->sendError('Tcomprobante not found');
        }

        $tcomprobante = $this->tcomprobanteRepository->update($input, $id);

        return $this->sendResponse($tcomprobante->toArray(), 'Tcomprobante updated successfully');
    }

    /**
     * Remove the specified Tcomprobante from storage.
     * DELETE /tcomprobantes/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Tcomprobante $tcomprobante */
        $tcomprobante = $this->tcomprobanteRepository->findWithoutFail($id);

        if (empty($tcomprobante)) {
            return $this->sendError('Tcomprobante not found');
        }

        $tcomprobante->delete();

        return $this->sendResponse($id, 'Tcomprobante deleted successfully');
    }
}
