<?php

namespace App\Repositories;

use App\Models\Icategoria;
use InfyOm\Generator\Common\BaseRepository;

class IcategoriaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombre',
        'descripcion'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Icategoria::class;
    }
}
