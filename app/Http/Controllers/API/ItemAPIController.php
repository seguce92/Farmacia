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
        $this->itemRepository->pushCriteria(new RequestCriteria($request));
        $this->itemRepository->pushCriteria(new LimitOffsetCriteria($request));
        $items = $this->itemRepository->all();

        $items2 = array();
        foreach($items as $item) {
            $temp = json_decode($item);

            $temp->um = $item->unimed->nombre;
            $temp->estado = $item->iestado->descripcion;
            $temp->laboratorio = $item->medicamentos->laboratorio->nombre;

            $items2[] = $temp;
        }

        //dd($itemsWcats);

        return $this->sendResponse($items2, 'Items retrieved successfully');
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
