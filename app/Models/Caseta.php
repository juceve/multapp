<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Caseta
 *
 * @property $id
 * @property $nro
 * @property $pasillo
 * @property $estado
 * @property $created_at
 * @property $updated_at
 *
 * @property Sancione[] $sanciones
 * @property Vinculo[] $vinculos
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Caseta extends Model
{

    static $rules = [
        'nro' => 'required',
        'pasillo' => 'required',
        'socio_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nro', 'pasillo', 'socio_id', 'estado'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function sanciones()
    {
        return $this->hasMany(\App\Models\Sancione::class, 'id', 'caseta_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function vinculos()
    {
        return $this->hasMany(\App\Models\Vinculo::class, 'id', 'caseta_id');
    }

    public function socio()
    {
        return $this->belongsTo(\App\Models\Socio::class, 'socio_id', 'id');
    }
}
