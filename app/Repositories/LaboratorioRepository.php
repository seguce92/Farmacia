<?php

namespace App\Repositories;

use App\Models\Laboratorio;
use InfyOm\Generator\Common\BaseRepository;

class LaboratorioRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombre'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Laboratorio::class;
    }
}
