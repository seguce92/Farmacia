<?php

namespace App\Repositories;

use App\Models\Proveedor;
use InfyOm\Generator\Common\BaseRepository;

class ProveedorRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombre' => 'like',
        'razon_social' => 'like',
        'nit' => 'like',
        'direccion' => 'like',
        'telefono' => 'like'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Proveedor::class;
    }
}
