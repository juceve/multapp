<?php

namespace App\Http\Controllers;

use App\Models\Socio;
use Illuminate\Http\Request;

/**
 * Class SocioController
 * @package App\Http\Controllers
 */
class SocioController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin.socios.index')->only('index');
        $this->middleware('can:admin.socios.create')->only('create', 'store');
        $this->middleware('can:admin.socios.edit')->only('edit', 'update');
        $this->middleware('can:admin.socios.destroy')->only('destroy');
    }

    public function index()
    {
        $socios = Socio::all();

        return view('socio.index', compact('socios'))
            ->with('i', 0);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $socio = new Socio();
        return view('socio.create', compact('socio'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Socio::$rules);

        $socio = Socio::create($request->all());

        return redirect()->route('socios.index')
            ->with('success', 'Socio creado correctamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $socio = Socio::find($id);

        return view('socio.show', compact('socio'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $socio = Socio::find($id);

        return view('socio.edit', compact('socio'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Socio $socio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Socio $socio)
    {
        request()->validate(Socio::$rules);

        $socio->update($request->all());

        return redirect()->route('socios.index')
            ->with('success', 'Socio editado correctamente');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $socio = Socio::find($id)->delete();

        return redirect()->route('socios.index')
            ->with('success', 'Socio eliminado correctamente');
    }
}
