<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateTempCompraDetalleAPIRequest;
use App\Http\Requests\API\UpdateTempCompraDetalleAPIRequest;
use App\Models\TempCompraDetalle;
use App\Repositories\TempCompraDetalleRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class TempCompraDetalleController
 * @package App\Http\Controllers\API
 */

class TempCompraDetalleAPIController extends AppBaseController
{
    /** @var  TempCompraDetalleRepository */
    private $tempCompraDetalleRepository;

    public function __construct(TempCompraDetalleRepository $tempCompraDetalleRepo)
    {
        $this->tempCompraDetalleRepository = $tempCompraDetalleRepo;
    }

    /**
     * Display a listing of the TempCompraDetalle.
     * GET|HEAD /tempCompraDetalles
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->tempCompraDetalleRepository->pushCriteria(new RequestCriteria($request));
        $this->tempCompraDetalleRepository->pushCriteria(new LimitOffsetCriteria($request));
        $tempCompraDetalles = $this->tempCompraDetalleRepository->all();

        return $this->sendResponse($tempCompraDetalles->toArray(), 'Temp Compra Detalles retrieved successfully');
    }

    /**
     * Store a newly created TempCompraDetalle in storage.
     * POST /tempCompraDetalles
     *
     * @param CreateTempCompraDetalleAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateTempCompraDetalleAPIRequest $request)
    {
        $input = $request->all();

        $tempCompraDetalles = $this->tempCompraDetalleRepository->create($input);

        $tempCompraDetalles->item;
        $tempCompraDetalles->item->medicamento->laboratorio;

        return $this->sendResponse($tempCompraDetalles->toArray(), 'Temp Compra Detalle saved successfully');
    }

    /**
     * Display the specified TempCompraDetalle.
     * GET|HEAD /tempCompraDetalles/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var TempCompraDetalle $tempCompraDetalle */
        $tempCompraDetalle = $this->tempCompraDetalleRepository->findWithoutFail($id);

        if (empty($tempCompraDetalle)) {
            return $this->sendError('Temp Compra Detalle not found');
        }

        return $this->sendResponse($tempCompraDetalle->toArray(), 'Temp Compra Detalle retrieved successfully');
    }

    /**
     * Update the specified TempCompraDetalle in storage.
     * PUT/PATCH /tempCompraDetalles/{id}
     *
     * @param  int $id
     * @param UpdateTempCompraDetalleAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTempCompraDetalleAPIRequest $request)
    {
        $input = $request->all();

        /** @var TempCompraDetalle $tempCompraDetalle */
        $tempCompraDetalle = $this->tempCompraDetalleRepository->findWithoutFail($id);

        if (empty($tempCompraDetalle)) {
            return $this->sendError('Temp Compra Detalle not found');
        }

        $tempCompraDetalle = $this->tempCompraDetalleRepository->update($input, $id);

        return $this->sendResponse($tempCompraDetalle->toArray(), 'TempCompraDetalle updated successfully');
    }

    /**
     * Remove the specified TempCompraDetalle from storage.
     * DELETE /tempCompraDetalles/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var TempCompraDetalle $tempCompraDetalle */
        $tempCompraDetalle = $this->tempCompraDetalleRepository->findWithoutFail($id);

        if (empty($tempCompraDetalle)) {
            return $this->sendError('Temp Compra Detalle not found');
        }

        $tempCompraDetalle->delete();

        return $this->sendResponse($id, 'Temp Compra Detalle deleted successfully');
    }
}
