<?php

namespace App\Http\Controllers;

use App\DataTables\ItemDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateItemRequest;
use App\Http\Requests\UpdateItemRequest;
use App\Models\Clasificacion;
use App\Models\Icategoria;
use App\Models\Item;
use App\Models\Laboratorio;
use App\Models\Medicamento;
use App\Models\Unimed;
use App\Repositories\ItemRepository;
use App\Repositories\MedicamentoRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class ItemController extends AppBaseController
{
    /** @var  ItemRepository */
    private $itemRepository;
    private $medicamentoRepository;

    public function __construct(ItemRepository $itemRepo,MedicamentoRepository $medicamentoRepository)
    {
        $this->middleware("auth");
        $this->itemRepository = $itemRepo;
        $this->medicamentoRepository = $medicamentoRepository;
    }

    /**
     * Display a listing of the Item.
     *
     * @param ItemDataTable $itemDataTable
     * @return Response
     */
    public function index(ItemDataTable $itemDataTable)
    {
        return $itemDataTable->render('items.index');
    }

    /**
     * Show the form for creating a new Item.
     *
     * @return Response
     */
    public function create()
    {
        $unimeds = Unimed::pluck("nombre","id")->toArray();
        $categorias = Icategoria::pluck("nombre","id")->toArray();
        $categoriasItem= [];

        $laboratorios = Laboratorio::pluck('nombre','id')->toArray();
        $clasificacionesPadre = Clasificacion::where('clasificacion_id','=','3')->get();

        $clasificaciones=[];
        foreach ($clasificacionesPadre as $padre){
            $clasificaciones[$padre->nombre]= Clasificacion::where('clasificacion_id','=',$padre->id)->pluck('nombre','id')->toArray();
        };

        $medicamento = new Medicamento();


//        dd($unimeds);
        return view('items.create',compact('unimeds','categorias','categoriasItem','laboratorios','clasificaciones','medicamento'));
    }

    /**
     * Store a newly created Item in storage.
     *
     * @param CreateItemRequest $request
     *
     * @return Response
     */
    public function store(CreateItemRequest $request)
    {

        $input = $request->all();

        $medicamento= new Medicamento($input);
//        dd($medicamento->toArray());

        $item = $this->itemRepository->create($input);

        $item->icategorias()->sync(
            $request->categorias ? $request->categorias : []
        );

        //Actualiza y guarda imagen
        if ($request->hasFile('imagen')) {
            $this->saveImg($request->file('imagen'),$item);
        }

        if($item->esMedicamento()){
            $item->medicamento()->save($medicamento);
        }

        Flash::success('Item saved successfully.');

        return redirect(route('items.index'));
    }

    /**
     * Display the specified Item.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $item = $this->itemRepository->findWithoutFail($id);

        if (empty($item)) {
            Flash::error('Item not found');

            return redirect(route('items.index'));
        }

        return view('items.show')->with('item', $item);
    }

    /**
     * Show the form for editing the specified Item.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $item = $this->itemRepository->findWithoutFail($id);

        if (empty($item)) {
            Flash::error('Item not found');

            return redirect(route('items.index'));
        }else{
            $unimeds= array_pluck(Unimed::all()->toArray(),"nombre","id");
            $categorias = Icategoria::pluck("nombre","id")->toArray();
            $categoriasItem= array_pluck($item->icategorias->toArray(),"id");

            $laboratorios = Laboratorio::pluck('nombre','id')->toArray();
            $clasificacionesPadre = Clasificacion::where('clasificacion_id','=','3')->get();

            $clasificaciones=[];
            foreach ($clasificacionesPadre as $padre){
                $clasificaciones[$padre->nombre]= Clasificacion::where('clasificacion_id','=',$padre->id)->pluck('nombre','id')->toArray();
            };

            $medicamento = $item->medicamento;

            return view('items.edit',compact('item','unimeds','categorias','categoriasItem','laboratorios','clasificaciones','medicamento'));
        }

    }

    /**
     * Update the specified Item in storage.
     *
     * @param  int              $id
     * @param UpdateItemRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateItemRequest $request)
    {
        $item = $this->itemRepository->findWithoutFail($id);


        if (empty($item)) {
            Flash::error('Item not found');

            return redirect(route('items.index'));
        }

        $medicamento = $this->medicamentoRepository->findWithoutFail($request->medicamento_id);

        if (empty($medicamento)) {
            Flash::error('Medicamento not found');

            return redirect(route('items.index'));
        }

        $item = $this->itemRepository->update($request->all(), $id);

        //Actualiza y guarda imagen
        if ($request->hasFile('imagen')) {
            $this->saveImg($request->file('imagen'),$item);
        }

        //Sincroniza las categorías
        $item->icategorias()->sync(
            $request->categorias ? $request->categorias : []
        );

        //Actualiza el medicamento
        $medicamento = $this->medicamentoRepository->update($request->all(), $request->medicamento_id);

        Flash::success('Item updated successfully.');

        return redirect(route('items.index'));

    }

    /**
     * Remove the specified Item from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $item = $this->itemRepository->findWithoutFail($id);

        if (empty($item)) {
            Flash::error('Item not found');

            return redirect(route('items.index'));
        }

        $this->itemRepository->delete($id);

        Flash::success('Item deleted successfully.');

        return redirect(route('items.index'));
    }

    public function saveImg($file,Item $item){

        $nameImg= $item->id.'.'.$file->extension();

        $item->imagen = 'img/items/'.$nameImg;
        $item->save();

        $file->move(public_path().'/img/items/',$nameImg);
    }
}
