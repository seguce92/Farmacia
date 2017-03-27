<?php

namespace App\DataTables;

use App\Models\Venta;
use Form;
use Yajra\Datatables\Services\DataTable;

class VentaDataTable extends DataTable
{

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function ajax()
    {
        return $this->datatables
            ->eloquent($this->query())
            ->addColumn('action', 'ventas.datatables_actions')
            ->make(true);
    }

    /**
     * Get the query object to be processed by datatables.
     *
     * @return \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        $ventas = Venta::query();

        return $this->applyScopes($ventas);
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
            'cliente_id' => ['name' => 'cliente_id', 'data' => 'cliente_id'],
            'fecha' => ['name' => 'fecha', 'data' => 'fecha'],
            'serie' => ['name' => 'serie', 'data' => 'serie'],
            'numero' => ['name' => 'numero', 'data' => 'numero'],
            'vestado_id' => ['name' => 'vestado_id', 'data' => 'vestado_id'],
            'user_id' => ['name' => 'user_id', 'data' => 'user_id']
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'ventas';
    }
}
