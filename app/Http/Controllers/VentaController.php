<?php

namespace App\Http\Controllers;

use App\DataTables\VentaDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateVentaRequest;
use App\Http\Requests\UpdateVentaRequest;
use App\Models\Cliente;
use App\Repositories\VentaRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class VentaController extends AppBaseController
{
    /** @var  VentaRepository */
    private $ventaRepository;

    public function __construct(VentaRepository $ventaRepo)
    {
        $this->middleware('auth');
        $this->ventaRepository = $ventaRepo;
    }

    /**
     * Display a listing of the Venta.
     *
     * @param VentaDataTable $ventaDataTable
     * @return Response
     */
    public function index(VentaDataTable $ventaDataTable)
    {
        return $ventaDataTable->render('ventas.index');
    }

    /**
     * Show the form for creating a new Venta.
     *
     * @return Response
     */
    public function create()
    {
        $clientes = Cliente::all();
        return view('ventas.create',compact('clientes'));
    }

    /**
     * Store a newly created Venta in storage.
     *
     * @param CreateVentaRequest $request
     *
     * @return Response
     */
    public function store(CreateVentaRequest $request)
    {
        $input = $request->all();

        dd($input);
        $venta = $this->ventaRepository->create($input);

        Flash::success('Venta saved successfully.');

        return redirect(route('ventas.index'));
    }

    /**
     * Display the specified Venta.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $venta = $this->ventaRepository->findWithoutFail($id);

        if (empty($venta)) {
            Flash::error('Venta not found');

            return redirect(route('ventas.index'));
        }

        return view('ventas.show')->with('venta', $venta);
    }

    /**
     * Show the form for editing the specified Venta.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $venta = $this->ventaRepository->findWithoutFail($id);

        if (empty($venta)) {
            Flash::error('Venta not found');

            return redirect(route('ventas.index'));
        }

        return view('ventas.edit')->with('venta', $venta);
    }

    /**
     * Update the specified Venta in storage.
     *
     * @param  int              $id
     * @param UpdateVentaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateVentaRequest $request)
    {
        $venta = $this->ventaRepository->findWithoutFail($id);

        if (empty($venta)) {
            Flash::error('Venta not found');

            return redirect(route('ventas.index'));
        }

        $venta = $this->ventaRepository->update($request->all(), $id);

        Flash::success('Venta updated successfully.');

        return redirect(route('ventas.index'));
    }

    /**
     * Remove the specified Venta from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $venta = $this->ventaRepository->findWithoutFail($id);

        if (empty($venta)) {
            Flash::error('Venta not found');

            return redirect(route('ventas.index'));
        }

        $this->ventaRepository->delete($id);

        Flash::success('Venta deleted successfully.');

        return redirect(route('ventas.index'));
    }
}
