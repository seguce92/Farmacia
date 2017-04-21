<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Horario
 * @package App\Models
 * @version April 20, 2017, 11:11 am CST
 */
class Horario extends Model
{
    use SoftDeletes;

    public $table = 'horarios';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'dia',
        'hora_ini',
        'hora_fin'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'dia' => 'days',
        'hora_ini' => 'integer',
        'hora_fin' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'dia' => 'required|max:1|unique:horarios',
        'hora_ini' => 'required|numeric|digits_between:1,2|between:0,24',
        'hora_fin' => 'required|numeric|digits_between:1,2|between:0,24'
    ];


}
