<?php

namespace App\Http\Livewire;

use App\Models\Sancione;
use Livewire\Component;
use Livewire\WithPagination;

class RptSanciondia extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';


    public function render()
    {
        $sancione = Sancione::where('fecha', date('Y-m-d'))
            ->orderBy('caseta_id', 'ASC')
            ->get();
        return view('livewire.rpt-sanciondia', ['sanciones' => $sancione])->with('i', 1);
    }
}
