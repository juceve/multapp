<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Pago
 *
 * @property $id
 * @property $fecha
 * @property $origen_id
 * @property $modelo
 * @property $importe
 * @property $tipopago_id
 * @property $estado
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Pago extends Model
{
    
    static $rules = [
		'fecha' => 'required',
		'origen_id' => 'required',
		'modelo' => 'required|string',
		'importe' => 'required',
		'tipopago_id' => 'required',
		'estado' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['fecha','origen_id','modelo','importe','tipopago_id','estado'];



}
