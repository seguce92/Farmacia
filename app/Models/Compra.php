<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Compra
 * @package App\Models
 * @version March 26, 2017, 5:11 pm CST
 */
class Compra extends Model
{
    use SoftDeletes;

    public $table = 'compras';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'proveedor_id',
        'tcomprobante_id',
        'fecha',
        'serie',
        'numero',
        'cestado_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'proveedor_id' => 'integer',
        'tcomprobante_id' => 'integer',
        'serie' => 'string',
        'numero' => 'string',
        'cestado_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'proveedor_id' => 'required',
        'tcomprobante_id' => 'required',
//        'serie' => 'required',
//        'numero' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function proveedor()
    {
        return $this->belongsTo(\App\Models\Proveedor::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function cestado()
    {
        return $this->belongsTo(\App\Models\Cestado::class);
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
    public function compraDetalles()
    {
        return $this->hasMany(\App\Models\CompraDetalle::class);
    }
}
