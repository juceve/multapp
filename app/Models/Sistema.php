<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Sistema
 *
 * @property $id
 * @property $leyendaboleta
 * @property $dato1
 * @property $dato2
 * @property $dato3
 * @property $dato4
 * @property $dato5
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Sistema extends Model
{

  static $rules = [];

  protected $perPage = 20;

  /**
   * Attributes that should be mass-assignable.
   *
   * @var array
   */
  protected $fillable = ['leyendaboleta', 'dato1', 'dato2', 'dato3', 'dato4', 'dato5'];
}
