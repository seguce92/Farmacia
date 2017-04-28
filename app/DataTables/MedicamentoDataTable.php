<?php

namespace App\DataTables;

use App\Models\Medicamento;
use Form;
use Yajra\Datatables\Services\DataTable;

class MedicamentoDataTable extends DataTable
{

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function ajax()
    {
        return $this->datatables
            ->eloquent($this->query())
            ->addColumn('action', 'medicamentos.datatables_actions')
//            ->editColumn('receta', function ($data){
//                return $data->receta ? 'SI' : 'NO';
//            })
//            ->editColumn('generico', function ($data){
//                return $data->generico ? 'SI' : 'NO';
//            })
            ->make(true);
    }

    /**
     * Get the query object to be processed by datatables.
     *
     * @return \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        $medicamentos = Medicamento::query()
            ->join('laboratorios','laboratorios.id','=','medicamentos.laboratorio_id')
            ->leftJoin('clasificacions','clasificacions.id','=','medicamentos.clasificacion_id')
            ->join('unimeds','unimeds.id','=','medicamentos.unimed_id')
            ->select(
             'medicamentos.*',
             'laboratorios.nombre as laboratorio',
             'clasificacions.nombre as clasificacion',
             'unimeds.nombre as unimed'
            );


        return $this->applyScopes($medicamentos);
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\Datatables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->columns($this->getColumns())
            ->addAction(['width' => '10%'])
            ->ajax('')
            ->parameters([
                'dom' => 'Bfrtip',
                'scrollX' => false,
                'responsive' => true,
                'buttons' => [
                    'print',
                    'reset',
                    'reload',
                    [
                         'extend'  => 'collection',
                         'text'    => '<i class="fa fa-download"></i> Export',
                         'buttons' => [
                             'csv',
                             'excel',
                             'pdf',
                         ],
                    ],
                    'colvis'
                ]
            ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    private function getColumns()
    {
        return [
            'nombre' => ['name' => 'nombre', 'data' => 'nombre'],
            'laboratorio' => ['name' => 'laboratorios.nombre', 'data' => 'laboratorio'],
            'clasificacion' => ['name' => 'clasificacions.nombre', 'data' => 'clasificacion'],
            'unimed' => ['name' => 'unimeds.nombre', 'data' => 'unimed'],
            'receta' => ['name' => 'receta', 'data' => 'receta'],
            'generico' => ['name' => 'generico', 'data' => 'generico'],
//            'item_id' => ['name' => 'item_id', 'data' => 'item_id'],
            'cnt_total' => ['name' => 'cnt_total', 'data' => 'cnt_total'],
            'cnt_formula' => ['name' => 'cnt_formula', 'data' => 'cnt_formula'],
//            'indicaciones' => ['name' => 'indicaciones', 'data' => 'indicaciones'],
//            'dosis' => ['name' => 'dosis', 'data' => 'dosis'],
//            'contraindicaciones' => ['name' => 'contraindicaciones', 'data' => 'contraindicaciones'],
//            'advertencias' => ['name' => 'advertencias', 'data' => 'advertencias'],
            'contiene' => ['name' => 'contiene', 'data' => 'contiene']
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'medicamentos';
    }
}
