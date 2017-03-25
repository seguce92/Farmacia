<?php

namespace App\Http\Controllers;

use App\DataTables\CompraDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateCompraRequest;
use App\Http\Requests\UpdateCompraRequest;
use App\Repositories\CompraRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class CompraController extends AppBaseController
{
    /** @var  CompraRepository */
    private $compraRepository;

    public function __construct(CompraRepository $compraRepo)
    {
        $this->middleware('auth');
        $this->compraRepository = $compraRepo;
    }

    /**
     * Display a listing of the Compra.
     *
     * @param CompraDataTable $compraDataTable
     * @return Response
     */
    public function index(CompraDataTable $compraDataTable)
    {
        return $compraDataTable->render('compras.index');
    }

    /**
     * Show the form for creating a new Compra.
     *
     * @return Response
     */
    public function create()
    {
        return view('compras.create');
    }

    /**
     * Store a newly created Compra in storage.
     *
     * @param CreateCompraRequest $request
     *
     * @return Response
     */
    public function store(CreateCompraRequest $request)
    {
        $input = $request->all();

        $compra = $this->compraRepository->create($input);

        Flash::success('Compra saved successfully.');

        return redirect(route('compras.index'));
    }

    /**
     * Display the specified Compra.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $compra = $this->compraRepository->findWithoutFail($id);

        if (empty($compra)) {
            Flash::error('Compra not found');

            return redirect(route('compras.index'));
        }

        return view('compras.show')->with('compra', $compra);
    }

    /**
     * Show the form for editing the specified Compra.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $compra = $this->compraRepository->findWithoutFail($id);

        if (empty($compra)) {
            Flash::error('Compra not found');

            return redirect(route('compras.index'));
        }

        return view('compras.edit')->with('compra', $compra);
    }

    /**
     * Update the specified Compra in storage.
     *
     * @param  int              $id
     * @param UpdateCompraRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCompraRequest $request)
    {
        $compra = $this->compraRepository->findWithoutFail($id);

        if (empty($compra)) {
            Flash::error('Compra not found');

            return redirect(route('compras.index'));
        }

        $compra = $this->compraRepository->update($request->all(), $id);

        Flash::success('Compra updated successfully.');

        return redirect(route('compras.index'));
    }

    /**
     * Remove the specified Compra from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $compra = $this->compraRepository->findWithoutFail($id);

        if (empty($compra)) {
            Flash::error('Compra not found');

            return redirect(route('compras.index'));
        }

        $this->compraRepository->delete($id);

        Flash::success('Compra deleted successfully.');

        return redirect(route('compras.index'));
    }
}
