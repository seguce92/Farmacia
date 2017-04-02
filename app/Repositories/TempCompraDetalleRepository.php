<?php

namespace App\Repositories;

use App\Models\TempCompraDetalle;
use InfyOm\Generator\Common\BaseRepository;

class TempCompraDetalleRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'temp_compra_id',
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
        return TempCompraDetalle::class;
    }
}
