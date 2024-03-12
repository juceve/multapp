<?php

namespace App\Http\Controllers;

use App\Models\Caseta;
use App\Models\Socio;
use Illuminate\Http\Request;

/**
 * Class CasetaController
 * @package App\Http\Controllers
 */
class CasetaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $casetas = Caseta::all();

        return view('caseta.index', compact('casetas'))
            ->with('i', 0);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $caseta = new Caseta();
        $socios = Socio::orderBy('nombre', 'ASC')->get()->pluck('nombre', 'id');
        return view('caseta.create', compact('caseta', 'socios'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Caseta::$rules);

        $caseta = Caseta::create($request->all());

        return redirect()->route('casetas.index')
            ->with('success', 'Caseta creada correctamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $caseta = Caseta::find($id);

        return view('caseta.show', compact('caseta'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $caseta = Caseta::find($id);
        $socios = Socio::orderBy('nombre', 'ASC')->get()->pluck('nombre', 'id');
        return view('caseta.edit', compact('caseta', 'socios'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Caseta $caseta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Caseta $caseta)
    {
        request()->validate(Caseta::$rules);

        $caseta->update($request->all());

        return redirect()->route('casetas.index')
            ->with('success', 'Caseta editada correctamente');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $caseta = Caseta::find($id)->delete();

        return redirect()->route('casetas.index')
            ->with('success', 'Caseta eliminada correctamente');
    }
}
