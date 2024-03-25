<?php

namespace App\Http\Livewire;

use App\Models\Caseta;
use App\Models\Sancione;
use App\Models\Sistema;
use App\Models\Vw_sancione;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Livewire\Component;
use Livewire\WithPagination;

class SancionesListado extends Component
{

    public $pasillos, $casetas, $sanciones;
    public $pasillo = "", $nrocaseta = "", $fechaI = "", $fechaF = "", $socio = "";
    public $filas = 1, $browseMobile;

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

        $this->sanciones =  Vw_sancione::where([
            ['fecha', '>=', $this->fechaI],
            ['fecha', '<=', $this->fechaF],
            ['pasillo', 'LIKE', "%" . $this->pasillo . "%"],
            ['nrocaseta', 'LIKE', "%" . $this->nrocaseta . "%"],
            ['socio', 'LIKE', "%" . $this->socio . "%"]
        ])->get();
        $this->emit('dataTableL');

        $paramentros = array($this->pasillo, $this->nrocaseta, $this->fechaI, $this->fechaF, $this->socio);
        Session::put('sancionesAll', $this->sanciones);
        Session::put('parametros', $paramentros);

        return view('livewire.sanciones-listado')
            ->with('i', 1);
    }

    protected $listeners = ['cambiaEstado', 'realizarCobro', 'updBrowse'];

    public function updBrowse($status)
    {
        $this->browseMobile = $status;
        // dd($this->browseMobile);
    }

    public function cambiaEstado($id)
    {
        $sancione = Sancione::find($id);
        $sancione->estado = !$sancione->estado;
        $sancione->save();
        $this->filas++;
        $this->emit('success', 'Sanción anulada con exito!');
    }
    public function realizarCobro($id)
    {
        $sancione = Sancione::find($id);
        $sancione->estadopago = "PAGADO";
        $sancione->save();
        $this->filas++;
        $this->generaBoleta($id);
        $this->emit('success', 'Cobro realizado con exito!');
    }

    public function generaBoleta($id)
    {
        $sancion = Sancione::find($id);
        $sistema = Sistema::first();

        $boleta = $sancion->id . '|' . $sancion->fecha . '|' . $sancion->socio->nombre . '|' . $sancion->caseta->nro . '|' . $sancion->caseta->pasillo . '|' . $sancion->causale->id . '|' . $sancion->causal . '|' . $sancion->importe . '|' . $sancion->estadopago . '|' . $sancion->user->name . '|' . $sancion->url . '|' . $sistema->leyendaboleta;
        if ($this->browseMobile) {
            $this->emit('imprimir', $boleta);
        } else {
        }
    }

    public function exportarImagenes()
    {


        $this->emit('renderizarImg', '0');
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
