<?php

namespace App\Http\Livewire;

use App\Models\Sancione;
use Livewire\Component;

class CobroSanciones extends Component
{
    public function render()
    {
        $sanciones = Sancione::where('estadopago', 'IMPAGO')->get();
        return view('livewire.cobro-sanciones', compact('sanciones'))->extends('adminlte::page');
    }
}
