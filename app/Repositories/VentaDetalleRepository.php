<?php

namespace App\Repositories;

use App\Models\VentaDetalle;
use InfyOm\Generator\Common\BaseRepository;

class VentaDetalleRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'venta_id',
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
        return VentaDetalle::class;
    }
}
