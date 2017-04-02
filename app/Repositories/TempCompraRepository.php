<?php

namespace App\Repositories;

use App\Models\TempCompra;
use InfyOm\Generator\Common\BaseRepository;

class TempCompraRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'proveedore_id',
        'tcomprobante_id',
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
        return TempCompra::class;
    }
}
