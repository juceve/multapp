<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Socio
 *
 * @property $id
 * @property $nombre
 * @property $cedula
 * @property $ext
 * @property $emitido
 * @property $celular
 * @property $email
 * @property $estado
 * @property $created_at
 * @property $updated_at
 *
 * @property Sancione[] $sanciones
 * @property Vinculo[] $vinculos
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Socio extends Model
{

    static $rules = [
        'nombre' => 'required',
        'cedula' => 'required',

        'estado' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre', 'cedula', 'ext', 'emitido', 'celular', 'email', 'estado'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function sanciones()
    {
        return $this->hasMany(\App\Models\Sancione::class, 'id', 'socio_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function vinculos()
    {
        return $this->hasMany(\App\Models\Vinculo::class, 'id', 'socio_id');
    }
}
