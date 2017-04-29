<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateItemMedicamentoAPIRequest;
use App\Http\Requests\API\UpdateItemMedicamentoAPIRequest;
use App\Models\ItemMedicamento;
use App\Repositories\ItemMedicamentoRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class ItemMedicamentoController
 * @package App\Http\Controllers\API
 */

class ItemMedicamentoAPIController extends AppBaseController
{
    /** @var  ItemMedicamentoRepository */
    private $itemMedicamentoRepository;

    public function __construct(ItemMedicamentoRepository $itemMedicamentoRepo)
    {
        $this->itemMedicamentoRepository = $itemMedicamentoRepo;
    }

    /**
     * Display a listing of the ItemMedicamento.
     * GET|HEAD /itemMedicamentos
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

            $this->itemMedicamentoRepository->setFieldSearchable($fieldsSearch);
        }

        $this->itemMedicamentoRepository->pushCriteria(new RequestCriteria($request));
        $this->itemMedicamentoRepository->pushCriteria(new LimitOffsetCriteria($request));
        $itemMedicamentos = $this->itemMedicamentoRepository->all();

        //return $this->sendResponse($itemMedicamentos->toArray(), 'Item Medicamentos retrieved successfully');

        $result=[
            'success' => true,
            'rows' => count($itemMedicamentos),
            'data'    => $itemMedicamentos,
            'message' => 'Items retrieved successfully',
        ];

        return Response::json($result);
    }



    /**
     * Display the specified ItemMedicamento.
     * GET|HEAD /itemMedicamentos/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var ItemMedicamento $itemMedicamento */
        $itemMedicamento = $this->itemMedicamentoRepository->findWithoutFail($id);

        if (empty($itemMedicamento)) {
            return $this->sendError('Item Medicamento not found');
        }

        return $this->sendResponse($itemMedicamento->toArray(), 'Item Medicamento retrieved successfully');
    }

}
