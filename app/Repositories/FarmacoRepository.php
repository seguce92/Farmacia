<?php

namespace App\Repositories;

use App\Models\Farmaco;
use InfyOm\Generator\Common\BaseRepository;

class FarmacoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'fcategoria_id',
        'nombre'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Farmaco::class;
    }
}
