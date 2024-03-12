<?php

namespace App\Http\Controllers;

use App\Models\Sancione;
use Illuminate\Http\Request;

/**
 * Class SancioneController
 * @package App\Http\Controllers
 */
class SancioneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('sancione.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sancione = new Sancione();
        return view('sancione.create', compact('sancione'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Sancione::$rules);

        $sancione = Sancione::create($request->all());

        return redirect()->route('sanciones.index')
            ->with('success', 'Sancione created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sancione = Sancione::find($id);

        return view('sancione.show', compact('sancione'))->with('i', 1);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sancione = Sancione::find($id);

        return view('sancione.edit', compact('sancione'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Sancione $sancione
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sancione $sancione)
    {
        request()->validate(Sancione::$rules);

        $sancione->update($request->all());

        return redirect()->route('sanciones.index')
            ->with('success', 'Sancione updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $sancione = Sancione::find($id)->delete();

        return redirect()->route('sanciones.index')
            ->with('success', 'Sancione deleted successfully');
    }
}
