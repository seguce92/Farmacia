<?php

namespace App\DataTables;

use App\Models\Venta;
use App\Models\VistaVenta;
use Form;
use Illuminate\Support\Facades\DB;
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
            ->orderColumn('id', '-id $1')
            ->make(true);
    }

    /**
     * Get the query object to be processed by datatables.
     *
     * @return \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        $ventas = VistaVenta::query();

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
            'id' => ['name' => 'id', 'data' => 'id'],
            'cliente' => ['name' => 'cliente', 'data' => 'cliente'],
            'fecha' => ['name' => 'fecha', 'data' => 'fecha'],
            'hora' => ['name' => 'hora', 'data' => 'hora'],
            'S/N' => ['name' => 'ns', 'data' => 'ns'],
            'estado' => ['name' => 'estado', 'data' => 'estado'],
            'usuario' => ['name' => 'usuario', 'data' => 'usuario']
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
