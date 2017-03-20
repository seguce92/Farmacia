<?php

namespace App\Repositories;

use App\Models\Iestado;
use InfyOm\Generator\Common\BaseRepository;

class IestadoRepository extends BaseRepository
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
        return Iestado::class;
    }
}
