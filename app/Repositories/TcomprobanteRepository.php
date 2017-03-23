<?php

namespace App\Repositories;

use App\Models\Tcomprobante;
use InfyOm\Generator\Common\BaseRepository;

class TcomprobanteRepository extends BaseRepository
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
        return Tcomprobante::class;
    }
}
