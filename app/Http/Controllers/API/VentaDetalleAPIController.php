<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateVentaDetalleAPIRequest;
use App\Http\Requests\API\UpdateVentaDetalleAPIRequest;
use App\Models\VentaDetalle;
use App\Repositories\VentaDetalleRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class VentaDetalleController
 * @package App\Http\Controllers\API
 */

class VentaDetalleAPIController extends AppBaseController
{
    /** @var  VentaDetalleRepository */
    private $ventaDetalleRepository;

    public function __construct(VentaDetalleRepository $ventaDetalleRepo)
    {
        $this->ventaDetalleRepository = $ventaDetalleRepo;
    }

    /**
     * Display a listing of the VentaDetalle.
     * GET|HEAD /ventaDetalles
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->ventaDetalleRepository->pushCriteria(new RequestCriteria($request));
        $this->ventaDetalleRepository->pushCriteria(new LimitOffsetCriteria($request));
        $ventaDetalles = $this->ventaDetalleRepository->all();

        return $this->sendResponse($ventaDetalles->toArray(), 'Venta Detalles retrieved successfully');
    }

    /**
     * Store a newly created VentaDetalle in storage.
     * POST /ventaDetalles
     *
     * @param CreateVentaDetalleAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateVentaDetalleAPIRequest $request)
    {
        $input = $request->all();

        $ventaDetalles = $this->ventaDetalleRepository->create($input);

        return $this->sendResponse($ventaDetalles->toArray(), 'Venta Detalle saved successfully');
    }

    /**
     * Display the specified VentaDetalle.
     * GET|HEAD /ventaDetalles/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var VentaDetalle $ventaDetalle */
        $ventaDetalle = $this->ventaDetalleRepository->findWithoutFail($id);

        if (empty($ventaDetalle)) {
            return $this->sendError('Venta Detalle not found');
        }

        return $this->sendResponse($ventaDetalle->toArray(), 'Venta Detalle retrieved successfully');
    }

    /**
     * Update the specified VentaDetalle in storage.
     * PUT/PATCH /ventaDetalles/{id}
     *
     * @param  int $id
     * @param UpdateVentaDetalleAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateVentaDetalleAPIRequest $request)
    {
        $input = $request->all();

        /** @var VentaDetalle $ventaDetalle */
        $ventaDetalle = $this->ventaDetalleRepository->findWithoutFail($id);

        if (empty($ventaDetalle)) {
            return $this->sendError('Venta Detalle not found');
        }

        $ventaDetalle = $this->ventaDetalleRepository->update($input, $id);

        return $this->sendResponse($ventaDetalle->toArray(), 'VentaDetalle updated successfully');
    }

    /**
     * Remove the specified VentaDetalle from storage.
     * DELETE /ventaDetalles/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var VentaDetalle $ventaDetalle */
        $ventaDetalle = $this->ventaDetalleRepository->findWithoutFail($id);

        if (empty($ventaDetalle)) {
            return $this->sendError('Venta Detalle not found');
        }

        $ventaDetalle->delete();

        return $this->sendResponse($id, 'Venta Detalle deleted successfully');
    }
}
