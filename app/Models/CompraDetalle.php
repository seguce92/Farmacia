<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class CompraDetalle
 * @package App\Models
 * @version March 25, 2017, 5:19 pm CST
 */
class CompraDetalle extends Model
{
    use SoftDeletes;

    public $table = 'compra_detalles';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'compra_id',
        'item_id',
        'cantidad',
        'precio',
        'descuento'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'compra_id' => 'integer',
        'item_id' => 'integer'
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
    public function compra()
    {
        return $this->belongsTo(\App\Models\Compra::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function item()
    {
        return $this->belongsTo(\App\Models\Item::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function lotes()
    {
        return $this->belongsToMany(\App\Models\Lote::class, 'ingresos');
    }
}
