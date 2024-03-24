<?php

namespace App\Http\Controllers;

use App\Models\Causale;
use Illuminate\Http\Request;

/**
 * Class CausaleController
 * @package App\Http\Controllers
 */
class CausaleController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin.causales.index')->only('index');
        $this->middleware('can:admin.causales.create')->only('create', 'store');
        $this->middleware('can:admin.causales.edit')->only('edit', 'update');
        $this->middleware('can:admin.causales.destroy')->only('destroy');
    }

    public function index()
    {
        $causales = Causale::all();

        return view('causale.index', compact('causales'))
            ->with('i', 0);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $causale = new Causale();
        return view('causale.create', compact('causale'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Causale::$rules);

        $causale = Causale::create($request->all());

        return redirect()->route('causales.index')
            ->with('success', 'Causal creado correctamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $causale = Causale::find($id);

        return view('causale.show', compact('causale'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $causale = Causale::find($id);

        return view('causale.edit', compact('causale'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Causale $causale
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Causale $causale)
    {
        request()->validate(Causale::$rules);

        $causale->update($request->all());

        return redirect()->route('causales.index')
            ->with('success', 'Causal editado correctamente');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $causale = Causale::find($id)->delete();

        return redirect()->route('causales.index')
            ->with('success', 'Causal eliminado correctamente');
    }
}
