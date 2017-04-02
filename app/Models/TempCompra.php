<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class TempCompra
 * @package App\Models
 * @version March 30, 2017, 4:47 pm CST
 */
class TempCompra extends Model
{

    public $table = 'temp_compras';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'proveedore_id',
        'tcomprobante_id',
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
        'proveedore_id' => 'integer',
        'tcomprobante_id' => 'integer',
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
    public function proveedore()
    {
        return $this->belongsTo(\App\Models\Proveedore::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function tcomprobante()
    {
        return $this->belongsTo(\App\Models\Tcomprobante::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function tempCompraDetalles()
    {
        return $this->hasMany(\App\Models\TempCompraDetalle::class);
    }
}
