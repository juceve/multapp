<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vw_sancione extends Model
{
    use HasFactory;

    protected $fillable = ['fecha', 'socio_id', 'caseta_id', 'causale_id', 'user_id', 'causal', 'importe', 'estadopago', 'url', 'estado', 'nrocaseta', 'pasillo', 'socio', 'usuario'];
}
