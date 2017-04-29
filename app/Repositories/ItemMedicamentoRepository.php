<?php

namespace App\Repositories;

use App\Models\ItemMedicamento;
use InfyOm\Generator\Common\BaseRepository;

class ItemMedicamentoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombre' => 'like',
        'contiene' => 'like',
        'descripcion' => 'like',
        'codigo' => 'like',
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return ItemMedicamento::class;
    }

    public function setFieldSearchable($fields=[])
    {
        $this->fieldSearchable=$fields;

    }
}
