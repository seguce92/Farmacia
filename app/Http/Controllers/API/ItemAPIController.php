<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateItemAPIRequest;
use App\Http\Requests\API\UpdateItemAPIRequest;
use App\Models\Item;
use App\Repositories\ItemRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class ItemController
 * @package App\Http\Controllers\API
 */

class ItemAPIController extends AppBaseController
{
    /** @var  ItemRepository */
    private $itemRepository;

    public function __construct(ItemRepository $itemRepo)
    {
        $this->itemRepository = $itemRepo;
    }

    /**
     * Display a listing of the Item.
     * GET|HEAD /items
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        if($request->buscar_por!='todo'){
            $fieldsSearch = [];

            $fieldsSearch = $request->buscar_por=='nombre' ? array_add($fieldsSearch,'nombre','like') : $fieldsSearch ;
            $fieldsSearch = $request->buscar_por=='contiene' ? array_add($fieldsSearch,'contiene','like') : $fieldsSearch;
            $fieldsSearch = $request->buscar_por=='descripcion' ? array_add($fieldsSearch,'descripcion','like') : $fieldsSearch ;
            $fieldsSearch = $request->buscar_por=='codigo' ? array_add($fieldsSearch,'codigo','like') : $fieldsSearch ;

            $this->itemRepository->setFieldSearchable($fieldsSearch);
        }

        //dd($this->itemRepository->getFieldsSearchable(),$request->toArray());

        $this->itemRepository->pushCriteria(new RequestCriteria($request));
        $this->itemRepository->pushCriteria(new LimitOffsetCriteria($request));
        $items = $this->itemRepository->all();

        $items2 = array();
        foreach($items as $item) {
            $temp = json_decode($item);

            $temp->um = $item->unimed->nombre;
            $temp->estado = $item->iestado->descripcion;
            $temp->laboratorio = $item->medicamento->laboratorio->nombre;

            $items2[] = $temp;
        }

        $result=[
            'success' => true,
            'rows' => count($items2),
            'data'    => $items2,
            'message' => 'Items retrieved successfully',
        ];

        return Response::json($result);
    }

    /**
     * Store a newly created Item in storage.
     * POST /items
     *
     * @param CreateItemAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateItemAPIRequest $request)
    {
        $input = $request->all();

        $items = $this->itemRepository->create($input);

        return $this->sendResponse($items->toArray(), 'Item saved successfully');
    }

    /**
     * Display the specified Item.
     * GET|HEAD /items/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Item $item */
        $item = $this->itemRepository->findWithoutFail($id);

        if (empty($item)) {
            return $this->sendError('Item not found');
        }

        return $this->sendResponse($item->toArray(), 'Item retrieved successfully');
    }

    /**
     * Update the specified Item in storage.
     * PUT/PATCH /items/{id}
     *
     * @param  int $id
     * @param UpdateItemAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateItemAPIRequest $request)
    {
        $input = $request->all();

        /** @var Item $item */
        $item = $this->itemRepository->findWithoutFail($id);

        if (empty($item)) {
            return $this->sendError('Item not found');
        }

        $item = $this->itemRepository->update($input, $id);

        return $this->sendResponse($item->toArray(), 'Item updated successfully');
    }

    /**
     * Remove the specified Item from storage.
     * DELETE /items/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Item $item */
        $item = $this->itemRepository->findWithoutFail($id);

        if (empty($item)) {
            return $this->sendError('Item not found');
        }

        $item->delete();

        return $this->sendResponse($id, 'Item deleted successfully');
    }
}
