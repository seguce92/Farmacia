<?php

namespace App\Repositories;

use App\Models\CompraDetalle;
use InfyOm\Generator\Common\BaseRepository;

class CompraDetalleRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'compra_id',
        'item_id',
        'cantidad',
        'precion',
        'descuento'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return CompraDetalle::class;
    }
}
