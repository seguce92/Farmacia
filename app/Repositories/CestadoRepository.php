<?php

namespace App\Repositories;

use App\Models\Cestado;
use InfyOm\Generator\Common\BaseRepository;

class CestadoRepository extends BaseRepository
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
        return Cestado::class;
    }
}
