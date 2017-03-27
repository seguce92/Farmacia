<?php

namespace App\Repositories;

use App\Models\Venta;
use InfyOm\Generator\Common\BaseRepository;

class VentaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'cliente_id',
        'fecha',
        'serie',
        'numero',
        'vestado_id',
        'user_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Venta::class;
    }
}
