<?php

namespace App\Repositories;

use App\Models\TempVenta;
use InfyOm\Generator\Common\BaseRepository;

class TempVentaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'cliente_id',
        'fecha',
        'serie',
        'numero',
        'procesada',
        'user_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return TempVenta::class;
    }
}
