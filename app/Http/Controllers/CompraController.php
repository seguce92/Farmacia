<?php

namespace App\Http\Controllers;

use App\DataTables\CompraDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateCompraRequest;
use App\Http\Requests\UpdateCompraRequest;
use App\Models\CompraDetalle;
use App\Models\Proveedor;
use App\Models\Tcomprobante;
use App\Models\TempCompra;
use App\Repositories\CompraRepository;
use App\Repositories\TempCompraRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Response;

class CompraController extends AppBaseController
{
    /** @var  CompraRepository */
    private $compraRepository;
    private $tempCompraRepository;

    public function __construct(CompraRepository $compraRepo, TempCompraRepository $tempCompraRepoRepo)
    {
        $this->middleware('auth');
        $this->compraRepository = $compraRepo;
        $this->tempCompraRepository = $tempCompraRepoRepo;
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

        $user=Auth::user();

        $tempCompra = TempCompra::where('procesada',0)
            ->where('user_id',$user->id)
            ->get();

        ///si el usuario no tiene ninguna compra creada
        if($tempCompra->count()>1) {
            dd('el usuario tiene '.$tempCompra->count().' compras temporales');
        }

        if($tempCompra->count()==0){

            $tempCompra = TempCompra::create(['user_id' => $user->id]);

        }else{
            $tempCompra = $tempCompra[0];
        }

        $proveedores = Proveedor::pluck('nombre','id')->toArray();
        $tiposComprobantes = Tcomprobante::pluck('nombre','id')->toArray();

        return view('compras.create',compact('proveedores','tiposComprobantes','tempCompra'));

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
    public function update($id,UpdateCompraRequest $request)
    {
        $tempCompra = $this->tempCompraRepository->findWithoutFail($id);

        //dd($tempCompra->toArray(),$request->all());

        if (empty($tempCompra)) {
            Flash::error('Compra not found');

            return redirect(route('compras.index'));
        }

        $fillable = [
            'proveedor_id' => $request->proveedor_id,
            'tcomprobante_id' => $request->tcomprobante_id,
            'fecha' => date('Y-m-d H:i:s', strtotime($request->fecha)),
            'serie' => $request->serie,
            'numero' => $request->numero
        ];

//        dd($fillable);
        $tempCompra = $this->tempCompraRepository->update($fillable, $id);
        if ($request->procesar){
            $this->procesar($tempCompra,$request);

            Flash::success('Compra saved successfully.');

            return redirect(route('compras.index'));
        }else{

            Flash::success('Compra updated successfully.');

            return redirect(route('compras.create',['tempCompraUser' => $tempCompra]));
        }

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

    public function procesar(TempCompra $tempCompra,UpdateCompraRequest $request){

//        dd($tempCompra,$request);

        $input = $request->all();

        $collectDetalles=collect();

        foreach ($request->items as $index => $item){

            $obj= new CompraDetalle([
                'item_id' => $item,
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
            'cestado_id' => 2
        ];

        $compra = $this->compraRepository->create($fillable);

        $compra->compraDetalles()->saveMany($collectDetalles);

        $tempCompra->procesada=1;
        $tempCompra->save();
    }
}
