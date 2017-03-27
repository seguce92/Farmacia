<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Farmaco
 * @package App\Models
 * @version March 27, 2017, 12:55 pm CST
 */
class Farmaco extends Model
{
    use SoftDeletes;

    public $table = 'farmacos';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'fcategoria_id',
        'nombre'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'fcategoria_id' => 'integer',
        'nombre' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function fcategoria()
    {
        return $this->belongsTo(\App\Models\Fcategoria::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function farmacoMedicamentos()
    {
        return $this->hasMany(\App\Models\FarmacoMedicamento::class);
    }
}
