<?php

namespace App\Repositories;

use App\Models\TempVentaDetalle;
use InfyOm\Generator\Common\BaseRepository;

class TempVentaDetalleRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'temp_venta_id',
        'item_id',
        'cantidad',
        'precio',
        'descuento'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return TempVentaDetalle::class;
    }
}
