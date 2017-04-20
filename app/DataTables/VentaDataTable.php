<?php

namespace App\DataTables;

use App\Models\Venta;
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
            ->make(true);
    }

    /**
     * Get the query object to be processed by datatables.
     *
     * @return \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        $ventas = Venta::query()
            ->join('clientes','clientes.id','=','ventas.cliente_id')
            ->join('vestados','vestados.id','=','ventas.vestado_id')
            ->join('users','users.id','=','ventas.user_id')
            ->select(
                "ventas.*",
                DB::raw("concat(clientes.nit,' ',clientes.nombres,' ',clientes.apellidos) as cliente"),
                DB::raw("DATE_FORMAT(fecha,'%d/%m/%Y') as fechaf"),
                "vestados.descripcion as estado",
                "users.name as usuario"
            )->orderBy('created_at','vestado_id');

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
            'cliente' => ['name' => 'cliente', 'data' => 'cliente'],
            'fecha' => ['name' => 'fecha', 'data' => 'fechaf'],
            'serie' => ['name' => 'serie', 'data' => 'serie'],
            'numero' => ['name' => 'numero', 'data' => 'numero'],
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
