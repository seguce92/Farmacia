<?php

namespace App\Repositories;

use App\Models\Compra;
use InfyOm\Generator\Common\BaseRepository;

class CompraRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'proveedor_id',
        'fecha',
        'serie',
        'numero',
        'cestado_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Compra::class;
    }
}
