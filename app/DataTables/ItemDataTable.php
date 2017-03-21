<?php

namespace App\DataTables;

use App\Models\Item;
use Form;
use Yajra\Datatables\Services\DataTable;

class ItemDataTable extends DataTable
{

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function ajax()
    {
        return $this->datatables
            ->eloquent($this->query())
            ->addColumn('action', 'items.datatables_actions')
            ->make(true);
    }

    /**
     * Get the query object to be processed by datatables.
     *
     * @return \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        $items = Item::query()
                    ->join('iestados', 'items.iestado_id', '=', 'iestados.id')
                    ->join('unimeds', 'items.unimed_id', '=', 'unimeds.id')
            ->select(
                'items.id',
                'items.nombre',
                'items.descripcion',
                'items.precio',
                'items.codigo',
                'unimeds.nombre as unimed',
                'items.precio_pro',
                'iestados.descripcion as iestado'
            );
        return $this->applyScopes($items);
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
            'descripcion' => ['name' => 'descripcion', 'data' => 'descripcion'],
            'precio' => ['name' => 'precio', 'data' => 'precio'],
            'codigo' => ['name' => 'codigo', 'data' => 'codigo'],
            'U/M' => ['name' => 'unimed', 'data' => 'unimed'],
            'precio_pro' => ['name' => 'precio_pro', 'data' => 'precio_pro'],
            'estados' => ['name' => 'iestado', 'data' => 'iestado']
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'items';
    }
}
