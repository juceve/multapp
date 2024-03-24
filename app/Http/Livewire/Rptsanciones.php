<?php

namespace App\Http\Livewire;

use App\Models\Caseta;
use App\Models\Vw_sancione;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Rptsanciones extends Component
{
    public $sanciones;
    public $fechaI = "", $fechaF = "";


    public function render()
    {
        $this->sanciones =  Vw_sancione::where('fecha', '>=', $this->fechaI)
            ->where('fecha', '<=', $this->fechaF)
            ->get();
        $this->emit('dataTableL1');
        return view('livewire.rptsanciones')->extends('adminlte::page')->with('i', 0);
    }

    public function mount()
    {
        $this->fechaI = date('Y-m-d');
        $this->fechaF = date('Y-m-d');
    }
}
