<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Causale
 *
 * @property $id
 * @property $nombre
 * @property $importe
 * @property $created_at
 * @property $updated_at
 *
 * @property Sancione[] $sanciones
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Causale extends Model
{
    
    static $rules = [
		'nombre' => 'required|string',
		'importe' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre','importe'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function sanciones()
    {
        return $this->hasMany(\App\Models\Sancione::class, 'id', 'causale_id');
    }
    

}
