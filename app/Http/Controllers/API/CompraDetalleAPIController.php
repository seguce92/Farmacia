<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateCompraDetalleAPIRequest;
use App\Http\Requests\API\UpdateCompraDetalleAPIRequest;
use App\Models\CompraDetalle;
use App\Repositories\CompraDetalleRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class CompraDetalleController
 * @package App\Http\Controllers\API
 */

class CompraDetalleAPIController extends AppBaseController
{
    /** @var  CompraDetalleRepository */
    private $compraDetalleRepository;

    public function __construct(CompraDetalleRepository $compraDetalleRepo)
    {
        $this->compraDetalleRepository = $compraDetalleRepo;
    }

    /**
     * Display a listing of the CompraDetalle.
     * GET|HEAD /compraDetalles
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->compraDetalleRepository->pushCriteria(new RequestCriteria($request));
        $this->compraDetalleRepository->pushCriteria(new LimitOffsetCriteria($request));
        $compraDetalles = $this->compraDetalleRepository->all();

        return $this->sendResponse($compraDetalles->toArray(), 'Compra Detalles retrieved successfully');
    }

    /**
     * Store a newly created CompraDetalle in storage.
     * POST /compraDetalles
     *
     * @param CreateCompraDetalleAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateCompraDetalleAPIRequest $request)
    {
        $input = $request->all();

        $compraDetalles = $this->compraDetalleRepository->create($input);

        return $this->sendResponse($compraDetalles->toArray(), 'Compra Detalle saved successfully');
    }

    /**
     * Display the specified CompraDetalle.
     * GET|HEAD /compraDetalles/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var CompraDetalle $compraDetalle */
        $compraDetalle = $this->compraDetalleRepository->findWithoutFail($id);

        if (empty($compraDetalle)) {
            return $this->sendError('Compra Detalle not found');
        }

        return $this->sendResponse($compraDetalle->toArray(), 'Compra Detalle retrieved successfully');
    }

    /**
     * Update the specified CompraDetalle in storage.
     * PUT/PATCH /compraDetalles/{id}
     *
     * @param  int $id
     * @param UpdateCompraDetalleAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCompraDetalleAPIRequest $request)
    {
        $input = $request->all();

        /** @var CompraDetalle $compraDetalle */
        $compraDetalle = $this->compraDetalleRepository->findWithoutFail($id);

        if (empty($compraDetalle)) {
            return $this->sendError('Compra Detalle not found');
        }

        $compraDetalle = $this->compraDetalleRepository->update($input, $id);

        return $this->sendResponse($compraDetalle->toArray(), 'CompraDetalle updated successfully');
    }

    /**
     * Remove the specified CompraDetalle from storage.
     * DELETE /compraDetalles/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var CompraDetalle $compraDetalle */
        $compraDetalle = $this->compraDetalleRepository->findWithoutFail($id);

        if (empty($compraDetalle)) {
            return $this->sendError('Compra Detalle not found');
        }

        $compraDetalle->delete();

        return $this->sendResponse($id, 'Compra Detalle deleted successfully');
    }
}
