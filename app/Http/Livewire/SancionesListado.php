<?php

namespace App\Http\Livewire;

use App\Models\Caseta;
use App\Models\Sancione;
use App\Models\Vw_sancione;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class SancionesListado extends Component
{

    public $pasillos, $casetas, $sanciones;
    public $pasillo = "", $nrocaseta = "", $fechaI = "", $fechaF = "", $socio = "";
    public $filas = 1;

    public function mount()
    {
        $this->fechaI = date('Y-m-d');
        $this->fechaF = date('Y-m-d');
        $this->casetas = Caseta::all();

        $this->sanciones =  Vw_sancione::where('fecha', '>=', $this->fechaI)
            ->where('fecha', '<=', $this->fechaF)
            ->get();
    }

    public function render()
    {
        if ($this->pasillo == "") {
            $this->pasillos = DB::select("SELECT DISTINCT(pasillo) FROM casetas");
            $this->casetas = Caseta::all();
        } else {
            $this->pasillos = DB::select("SELECT DISTINCT(pasillo) FROM casetas");
            $this->casetas = Caseta::where('pasillo', $this->pasillo)->get();
        }
        $this->emit('dataTableL');
        $this->sanciones =  Vw_sancione::where([
            ['fecha', '>=', $this->fechaI],
            ['fecha', '<=', $this->fechaF],
            ['pasillo', 'LIKE', "%" . $this->pasillo . "%"],
            ['nrocaseta', 'LIKE', "%" . $this->nrocaseta . "%"],
            ['socio', 'LIKE', "%" . $this->socio . "%"]
        ])->get();

        return view('livewire.sanciones-listado')
            ->with('i', 1);
    }

    protected $listeners = ['cambiaEstado'];

    public function cambiaEstado($id)
    {
        $sancione = Sancione::find($id);
        $sancione->estado = !$sancione->estado;
        $sancione->save();
        $this->filas++;
    }

    public function generaBoleta($id)
    {
        $this->emit('renderizarpdf', $id);
    }


    public function updatedSocio()
    {
        $this->emit('dataTableL');
    }
    public function updatedPasillo()
    {
        $this->emit('dataTableL');
    }
    public function updatedNrocaseta()
    {
        $this->emit('dataTableL');
    }
    public function updatedFechaI()
    {
        $this->emit('dataTableL');
    }
    public function updatedFechaF()
    {
        $this->emit('dataTableL');
    }
}
