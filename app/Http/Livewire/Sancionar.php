<?php

namespace App\Http\Livewire;

use App\Models\Caseta;
use App\Models\Causale;
use App\Models\Sancione;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Intervention\Image\ImageManagerStatic as Image;

class Sancionar extends Component
{
    use WithFileUploads;
    public $vCaseta = "d-none", $vImporte = "d-none";
    public $causal = null, $causales, $causalid, $importe = 0;
    public $caseta = null, $casetas, $casetaid, $pasillo, $socio, $nombresocio;
    public $photo, $filename = "";

    public function updatedCausalid()
    {
        $this->causal = Causale::find($this->causalid);
        $this->vImporte = "";
        $this->importe = $this->causal->importe;
    }

    protected $listeners = ['cargaImagenBase64'];

    public function cargaImagenBase64($imagebase64)
    {
        $imageData = explode(';base64,', $imagebase64);
        if (count($imageData) == 2) {
            $image = base64_decode($imageData[1]);
            $filename = uniqid() . date('Hms') . '.png';
            if ($this->filename == "") {
                $this->filename = $filename;
            } else {
                $this->filename .= '|' . $filename;
            }

            $path = storage_path('app/public/livewire-tmp/' . $filename);

            $img = Image::make($image)->save($path);
        }
    }

    public function updatedCasetaid()
    {
        $this->vCaseta = "";
        $this->caseta = Caseta::find($this->casetaid);
        $this->pasillo = $this->caseta->pasillo;
        $this->socio = $this->caseta->socio;
        $this->nombresocio = $this->caseta->socio->nombre;
    }

    public function mount()
    {
        $this->causales = Causale::all();
        $this->casetas = Caseta::where('estado', 1)->get();
    }

    public function render()
    {
        return view('livewire.sancionar')->extends('adminlte::page');
    }
    public function sancionar()
    {
        $this->validate([
            "causalid" => "required",
            "importe" => "required",
            "casetaid" => "required",
            // 'photo' => 'image|max:2048',
        ]);

        DB::beginTransaction();
        try {
            $sancion = Sancione::create([
                "fecha" => date('Y-m-d'),
                "socio_id" => $this->caseta->socio_id,
                "caseta_id" => $this->caseta->id,
                "causale_id" => $this->causal->id,
                "causal" => $this->causal->nombre,
                "user_id" => Auth::user()->id,
                "importe" => $this->causal->importe,
                "estadopago" => "IMPAGO",
            ]);

            if ($this->filename) {
                $files = explode('|', $this->filename);
                $url = "";
                for ($i = 0; $i < count($files); $i++) {

                    if (Storage::disk('public')->exists("livewire-tmp/" . $files[$i])) {
                        Storage::disk('public')->move("livewire-tmp/" . $files[$i], "img-sanciones/" . $sancion->id . "_" . $i . ".png");

                        if ($url == "") {
                            $url = "img-sanciones/" . $sancion->id . "_" . $i . ".png";
                        } else {
                            $url .= '|' . "img-sanciones/" . $sancion->id . "_" . $i . ".png";
                        }
                    }
                }
                $sancion->url = $url;
                $sancion->save();
            }

            DB::commit();
            $boleta = $sancion->id . '|' . $sancion->fecha . '|' . $sancion->socio->nombre . '|' . $sancion->caseta->nro . '|' . $sancion->caseta->pasillo . '|' . $sancion->causale->id . '|' . $sancion->causal . '|' . $sancion->importe . '|' . $sancion->estadopago . '|' . $sancion->user->name . '|' . $sancion->url;

            $this->emit('imprimir', $boleta);
            return redirect()->route('sancionar')
                ->with('success', 'Sanción aplicada correctamente!');
        } catch (\Throwable $th) {
            DB::rollBack();
            $this->emit('error', $th->getMessage());
        }
    }
}
