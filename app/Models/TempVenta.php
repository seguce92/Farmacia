<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class TempVenta
 * @package App\Models
 * @version April 15, 2017, 4:54 pm CST
 */
class TempVenta extends Model
{
//    use SoftDeletes;

    public $table = 'temp_ventas';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'cliente_id',
        'fecha',
        'serie',
        'numero',
        'procesada',
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
        'procesada' => 'boolean',
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
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function tempVentaDetalles()
    {
        return $this->hasMany(\App\Models\TempVentaDetalle::class);
    }
}
