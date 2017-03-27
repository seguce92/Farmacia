<?php

namespace App\Repositories;

use App\Models\Fcategoria;
use InfyOm\Generator\Common\BaseRepository;

class FcategoriaRepository extends BaseRepository
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
        return Fcategoria::class;
    }
}
