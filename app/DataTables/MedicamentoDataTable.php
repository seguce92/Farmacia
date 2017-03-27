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
            ->make(true);
    }

    /**
     * Get the query object to be processed by datatables.
     *
     * @return \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        $medicamentos = Medicamento::query();

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
            'laboratotio_id' => ['name' => 'laboratotio_id', 'data' => 'laboratotio_id'],
            'clasificacion_id' => ['name' => 'clasificacion_id', 'data' => 'clasificacion_id'],
            'unimed_id' => ['name' => 'unimed_id', 'data' => 'unimed_id'],
            'item_id' => ['name' => 'item_id', 'data' => 'item_id'],
            'nombre' => ['name' => 'nombre', 'data' => 'nombre'],
            'receta' => ['name' => 'receta', 'data' => 'receta'],
            'cnt_total' => ['name' => 'cnt_total', 'data' => 'cnt_total'],
            'cnt_formula' => ['name' => 'cnt_formula', 'data' => 'cnt_formula'],
            'indicaciones' => ['name' => 'indicaciones', 'data' => 'indicaciones'],
            'dosis' => ['name' => 'dosis', 'data' => 'dosis'],
            'contraindicaciones' => ['name' => 'contraindicaciones', 'data' => 'contraindicaciones'],
            'advertencias' => ['name' => 'advertencias', 'data' => 'advertencias']
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
