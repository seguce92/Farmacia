<?php

namespace App\Repositories;

use App\Models\Vestado;
use InfyOm\Generator\Common\BaseRepository;

class VestadoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'descripcion'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Vestado::class;
    }
}
