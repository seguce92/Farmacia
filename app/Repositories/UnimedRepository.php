<?php

namespace App\Repositories;

use App\Models\Unimed;
use InfyOm\Generator\Common\BaseRepository;

class UnimedRepository extends BaseRepository
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
        return Unimed::class;
    }
}
