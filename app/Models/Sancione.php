<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Sancione
 *
 * @property $id
 * @property $fecha
 * @property $socio_id
 * @property $caseta_id
 * @property $causale_id
 * @property $causal
 * @property $importe
 * @property $estadopago
 * @property $estado
 * @property $created_at
 * @property $updated_at
 *
 * @property Caseta $caseta
 * @property Causale $causale
 * @property Socio $socio
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Sancione extends Model
{

    static $rules = [
        'fecha' => 'required',
        'socio_id' => 'required',
        'caseta_id' => 'required',
        'causale_id' => 'required',
        'causal' => 'required|string',
        'importe' => 'required',
        'estadopago' => 'required',
        'estado' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['fecha', 'socio_id', 'caseta_id', 'causale_id', 'user_id', 'causal', 'importe', 'estadopago', 'url', 'estado'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function caseta()
    {
        return $this->belongsTo(\App\Models\Caseta::class, 'caseta_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function causale()
    {
        return $this->belongsTo(\App\Models\Causale::class, 'causale_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function socio()
    {
        return $this->belongsTo(\App\Models\Socio::class, 'socio_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class, 'user_id', 'id');
    }
}
