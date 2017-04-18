<?php

namespace App\Http\Controllers;

use App\DataTables\VentaDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateVentaRequest;
use App\Http\Requests\UpdateVentaRequest;
use App\Models\Cliente;
use App\Models\TempVenta;
use App\Models\Venta;
use App\Models\VentaDetalle;
use App\Repositories\TempVentaRepository;
use App\Repositories\VentaRepository;
use Carbon\Carbon;
use Flash;
use App\Http\Controllers\AppBaseController;
use Illuminate\Support\Facades\Auth;
use Response;

class VentaController extends AppBaseController
{
    /** @var  VentaRepository */
    private $ventaRepository;
    private $tempVentaRepository;

    public function __construct(VentaRepository $ventaRepo,TempVentaRepository $tempVentaRepository)
    {
        $this->middleware('auth');
        $this->ventaRepository = $ventaRepo;
        $this->tempVentaRepository = $tempVentaRepository;
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
        $user=Auth::user();

        $tempVenta = TempVenta::where('procesada',0)
            ->where('user_id',$user->id)
            ->get();

        ///si el usuario no tiene ninguna venta creada
        if($tempVenta->count()>1) {
            dd('el usuario tiens '.$tempVenta->count().' compras temporales');
        }

        if($tempVenta->count()==0){

            $tempVenta = TempVenta::create([
                'user_id' => $user->id
            ]);

        }else{
            $tempVenta = $tempVenta[0];
        }


        $clientes = Cliente::all();

        return view('ventas.create',compact('clientes','tempVenta'));

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
        $venta = $this->tempVentaRepository->findWithoutFail($id);

        if (empty($venta)) {
            Flash::error('Venta not found');

            return redirect(route('ventas.index'));
        }

        $fecha=fechaDb($request->fecha);

        $fillable = [
            'cliente_id' => $request->cliente_id,
            'fecha' => $fecha   ,
            'serie' => $request->serie,
            'numero' => $request->numero
        ];

        $tempVenta = $this->tempVentaRepository->update($fillable, $id);

        if ($request->procesar){
            $this->procesar($tempVenta,$request);

            Flash::success('Venta saved successfully.');

            return redirect(route('ventas.index'));
        }else{

            Flash::success('Venta updated successfully.');

            return redirect(route('ventas.create',['tempVenta' => $tempVenta]));
        }

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

    public function procesar(TempVenta $tempVenta,UpdateVentaRequest $request){
        $user=Auth::user();

        $detalles = $tempVenta->tempVentaDetalles->map(function ($item) {
            return new VentaDetalle($item->toArray());
        });



        $datos = [
            'cliente_id' => $request->cliente_id,
            'fecha' => hoyDb(),
            'serie' => $request->serie,
            'numero' => $request->numero,
            'user_id' => $user->id,
            'recibido' => $request->recibido,
            'vestado_id' => 2
        ];

        $venta = $this->ventaRepository->create($datos);

        $venta->ventaDetalles()->saveMany($detalles);

        $tempVenta->procesada=1;
        $tempVenta->save();
    }

    public function cancelar(TempVenta $tempVenta){


        $tempVenta->delete();

        Flash::success('Listo! venta anulada.');

        return redirect(route('ventas.create'));
    }

    public function anular(Venta $venta){

        //dd("anular venta");

        $venta->vestado_id=4;
        $venta->save();
        $venta->ventaDetalles()->delete();

        Flash::success('Listo! venta Cancelada.');

        return redirect(route('ventas.index'));
    }
}
