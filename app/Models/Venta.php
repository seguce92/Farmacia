<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Venta
 * @package App\Models
 * @version March 27, 2017, 1:08 pm CST
 */
class Venta extends Model
{
    use SoftDeletes;

    public $table = 'ventas';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'cliente_id',
        'fecha',
        'serie',
        'numero',
        'vestado_id',
        'user_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'cliente_id' => 'integer',
        'serie' => 'string',
        'numero' => 'string',
        'vestado_id' => 'integer',
        'user_id' => 'integer'
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
    public function cliente()
    {
        return $this->belongsTo(\App\Models\Cliente::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function vestado()
    {
        return $this->belongsTo(\App\Models\Vestado::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function ventaDetalles()
    {
        return $this->hasMany(\App\Models\VentaDetalle::class);
    }
}
