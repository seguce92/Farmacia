<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Medicamento
 * @package App\Models
 * @version April 27, 2017, 8:35 pm CST
 */
class Medicamento extends Model
{
    use SoftDeletes;

    public $table = 'medicamentos';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
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
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'laboratorio_id' => 'integer',
        'clasificacion_id' => 'integer',
        'unimed_id' => 'integer',
        'item_id' => 'integer',
        'nombre' => 'string',
        'receta' => 'boolean',
        'indicaciones' => 'string',
        'dosis' => 'string',
        'contraindicaciones' => 'string',
        'advertencias' => 'string',
        'generico' => 'boolean',
        'contiene' => 'string'
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
    public function clasificacion()
    {
        return $this->belongsTo(\App\Models\Clasificacion::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function laboratorio()
    {
        return $this->belongsTo(\App\Models\Laboratorio::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function unimed()
    {
        return $this->belongsTo(\App\Models\Unimed::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function item()
    {
        return $this->belongsTo(\App\Models\Item::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     **/
    public function farmacoMedicamento()
    {
        return $this->hasOne(\App\Models\FarmacoMedicamento::class);
    }

    /**
     * Mutador para que el atributo reseta no devuelva un valor bool
     * @return string
     */
    public function getRecetaAttribute($value)
    {
        return $value ? 'SI' : 'NO';
    }

    /**
     * Mutador para que el atributo generico no devuelva un valor bool
     * @return string
     */
    public function getGenericoAttribute($value)
    {
        return $value ? 'SI' : 'NO';
    }
}
