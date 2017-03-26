<?php

namespace App\Http\Controllers;

use App\DataTables\CompraDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateCompraRequest;
use App\Http\Requests\UpdateCompraRequest;
use App\Models\CompraDetalle;
use App\Models\Tcomprobante;
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
        $tcomps = Tcomprobante::all();
        return view('compras.create',compact('tcomps'));
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

        $collectDetalles=collect();
        foreach ($request->detalles as $index => $detalle){

            $obj= new CompraDetalle([
                'item_id' => $request->items[$index],
                'cantidad' => $request->cantidades[$index],
                'precio' => $request->precios[$index]
            ]);

            $collectDetalles->push($obj);

        }

        $fillable = [
            'proveedor_id' => $request->proveedor_id,
            'fecha' => date('Y-m-d H:i:s', strtotime($request->fecha)),
            'serie' => $request->serie,
            'numero' => $request->numero,
            'tcomprobante_id' => $request->tcomprobante_id,
            'cestado_id' => 1
        ];

//        dd($fillable);

        $compra = $this->compraRepository->create($fillable);

        $compra->compraDetalles()->saveMany($collectDetalles);

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
