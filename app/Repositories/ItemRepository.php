<?php

namespace App\Repositories;

use App\Models\Item;
use InfyOm\Generator\Common\BaseRepository;

class ItemRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombre' => 'like',
        'codigo' => 'like',
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Item::class;
    }
}
