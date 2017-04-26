<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Item
 * @package App\Models
 * @version March 20, 2017, 12:07 pm CST
 */
class Item extends Model
{
    use SoftDeletes;

    public $table = 'items';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'nombre',
        'descripcion',
        'precio',
        'imagen',
        'codigo',
        'unimed_id',
        'iestado_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nombre' => 'string',
        'descripcion' => 'string',
        'imagen' => 'string',
        'codigo' => 'string',
        'unimed_id' => 'integer',
        'iestado_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        "nombre" => 'required|max:45',
        "precio" => 'required|numeric'

    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function iestado()
    {
        return $this->belongsTo(\App\Models\Iestado::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function unimed()
    {
        return $this->belongsTo(\App\Models\Unimed::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function compraDetalles()
    {
        return $this->hasMany(\App\Models\CompraDetalle::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function icategorias()
    {
        return $this->belongsToMany(\App\Models\Icategoria::class, 'icategoria_item');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function lotes()
    {
        return $this->hasMany(\App\Models\Lote::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function medicamentos()
    {
        return $this->hasOne(\App\Models\Medicamento::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function ventaDetalles()
    {
        return $this->hasMany(\App\Models\VentaDetalle::class);
    }
}
