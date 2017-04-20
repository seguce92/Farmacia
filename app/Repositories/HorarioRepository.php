<?php

namespace App\Repositories;

use App\Models\Horario;
use InfyOm\Generator\Common\BaseRepository;

class HorarioRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'dia',
        'hora_ini',
        'hora_fin'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Horario::class;
    }
}
