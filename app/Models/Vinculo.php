<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Vinculo
 *
 * @property $id
 * @property $caseta_id
 * @property $socio_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Caseta $caseta
 * @property Socio $socio
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Vinculo extends Model
{
    
    static $rules = [
		'caseta_id' => 'required',
		'socio_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['caseta_id','socio_id'];


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
    public function socio()
    {
        return $this->belongsTo(\App\Models\Socio::class, 'socio_id', 'id');
    }
    

}
