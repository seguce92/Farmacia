<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class TempCompraDetalle
 * @package App\Models
 * @version March 30, 2017, 5:31 pm CST
 */
class TempCompraDetalle extends Model
{

    public $table = 'temp_compra_detalles';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'temp_compra_id',
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
        'temp_compra_id' => 'integer',
        'item_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'temp_compra_id' => 'required',
        'item_id' => 'required',
        'cantidad' => 'required',
        'precio' => 'required',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function item()
    {
        return $this->belongsTo(\App\Models\Item::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function tempCompra()
    {
        return $this->belongsTo(\App\Models\TempCompra::class);
    }
}
