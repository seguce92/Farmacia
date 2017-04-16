<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class TempVentaDetalle
 * @package App\Models
 * @version April 15, 2017, 4:59 pm CST
 */
class TempVentaDetalle extends Model
{
//    use SoftDeletes;

    public $table = 'temp_venta_detalles';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'temp_venta_id',
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
        'temp_venta_id' => 'integer',
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
    public function item()
    {
        return $this->belongsTo(\App\Models\Item::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function tempVenta()
    {
        return $this->belongsTo(\App\Models\TempVenta::class);
    }
}
