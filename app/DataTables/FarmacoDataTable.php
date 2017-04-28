<?php

namespace App\DataTables;

use App\Models\Farmaco;
use Form;
use Yajra\Datatables\Services\DataTable;

class FarmacoDataTable extends DataTable
{

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function ajax()
    {
        return $this->datatables
            ->eloquent($this->query())
            ->addColumn('action', 'farmacos.datatables_actions')
            ->make(true);
    }

    /**
     * Get the query object to be processed by datatables.
     *
     * @return \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        $farmacos = Farmaco::query()
            ->join('fcategorias','fcategorias.id','=','farmacos.fcategoria_id')
            ->select(
                'farmacos.*',
                'fcategorias.nombre as categoria'
            );

        return $this->applyScopes($farmacos);
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
            'categoría' => ['name' => 'fcategorias.nombre', 'data' => 'categoria'],
            'nombre' => ['name' => 'nombre', 'data' => 'nombre']
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'farmacos';
    }
}
