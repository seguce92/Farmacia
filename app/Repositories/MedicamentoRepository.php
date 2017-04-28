<?php

namespace App\Repositories;

use App\Models\Medicamento;
use InfyOm\Generator\Common\BaseRepository;

class MedicamentoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'laboratorio_id',
        'clasificacion_id',
        'unimed_id',
        'item_id',
        'nombre',
        'receta',
        'cnt_total',
        'cnt_formula',
        'indicaciones',
        'dosis',
        'contraindicaciones',
        'advertencias',
        'generico',
        'contiene'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Medicamento::class;
    }
}
