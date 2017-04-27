<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateTempVentaDetalleAPIRequest;
use App\Http\Requests\API\UpdateTempVentaDetalleAPIRequest;
use App\Models\TempVentaDetalle;
use App\Repositories\TempVentaDetalleRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class TempVentaDetalleController
 * @package App\Http\Controllers\API
 */

class TempVentaDetalleAPIController extends AppBaseController
{
    /** @var  TempVentaDetalleRepository */
    private $tempVentaDetalleRepository;

    public function __construct(TempVentaDetalleRepository $tempVentaDetalleRepo)
    {
        $this->tempVentaDetalleRepository = $tempVentaDetalleRepo;
    }

    /**
     * Display a listing of the TempVentaDetalle.
     * GET|HEAD /tempVentaDetalles
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->tempVentaDetalleRepository->pushCriteria(new RequestCriteria($request));
        $this->tempVentaDetalleRepository->pushCriteria(new LimitOffsetCriteria($request));
        $tempVentaDetalles = $this->tempVentaDetalleRepository->all();

        return $this->sendResponse($tempVentaDetalles->toArray(), 'Temp Venta Detalles retrieved successfully');
    }

    /**
     * Store a newly created TempVentaDetalle in storage.
     * POST /tempVentaDetalles
     *
     * @param CreateTempVentaDetalleAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateTempVentaDetalleAPIRequest $request)
    {
        $input = $request->all();

        $tempVentaDetalles = $this->tempVentaDetalleRepository->create($input);

        $tempVentaDetalles->item;
        $tempVentaDetalles->item->medicamento->laboratorio;

        return $this->sendResponse($tempVentaDetalles->toArray(), 'Temp Venta Detalle saved successfully');
    }

    /**
     * Display the specified TempVentaDetalle.
     * GET|HEAD /tempVentaDetalles/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var TempVentaDetalle $tempVentaDetalle */
        $tempVentaDetalle = $this->tempVentaDetalleRepository->findWithoutFail($id);

        if (empty($tempVentaDetalle)) {
            return $this->sendError('Temp Venta Detalle not found');
        }

        return $this->sendResponse($tempVentaDetalle->toArray(), 'Temp Venta Detalle retrieved successfully');
    }

    /**
     * Update the specified TempVentaDetalle in storage.
     * PUT/PATCH /tempVentaDetalles/{id}
     *
     * @param  int $id
     * @param UpdateTempVentaDetalleAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTempVentaDetalleAPIRequest $request)
    {
        $input = $request->all();

        /** @var TempVentaDetalle $tempVentaDetalle */
        $tempVentaDetalle = $this->tempVentaDetalleRepository->findWithoutFail($id);

        if (empty($tempVentaDetalle)) {
            return $this->sendError('Temp Venta Detalle not found');
        }

        $tempVentaDetalle = $this->tempVentaDetalleRepository->update($input, $id);

        return $this->sendResponse($tempVentaDetalle->toArray(), 'TempVentaDetalle updated successfully');
    }

    /**
     * Remove the specified TempVentaDetalle from storage.
     * DELETE /tempVentaDetalles/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var TempVentaDetalle $tempVentaDetalle */
        $tempVentaDetalle = $this->tempVentaDetalleRepository->findWithoutFail($id);

        if (empty($tempVentaDetalle)) {
            return $this->sendError('Temp Venta Detalle not found');
        }

        $tempVentaDetalle->delete();

        return $this->sendResponse($id, 'Temp Venta Detalle deleted successfully');
    }
}
