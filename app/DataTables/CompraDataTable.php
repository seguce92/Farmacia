<?php

namespace App\DataTables;

use App\Models\Compra;
use Form;
use Yajra\Datatables\Services\DataTable;

class CompraDataTable extends DataTable
{

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function ajax()
    {
        return $this->datatables
            ->eloquent($this->query())
            ->addColumn('action', 'compras.datatables_actions')
            ->make(true);
    }

    /**
     * Get the query object to be processed by datatables.
     *
     * @return \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        $compras = Compra::query()
            ->join('proveedores','proveedores.id','=','compras.proveedor_id')
            ->join('cestados','cestados.id','=','compras.cestado_id')
            ->select(
                'compras.*',
                'proveedores.nombre as proveedor',
                'cestados.descripcion as estado'
            );

        return $this->applyScopes($compras);
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
            'proveedor' => ['name' => 'proveedor', 'data' => 'proveedor'],
            'fecha' => ['name' => 'fecha', 'data' => 'fecha'],
            'serie' => ['name' => 'serie', 'data' => 'serie'],
            'numero' => ['name' => 'numero', 'data' => 'numero'],
            'estado' => ['name' => 'estado', 'data' => 'estado']
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'compras';
    }
}
