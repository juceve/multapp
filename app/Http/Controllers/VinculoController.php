<?php

namespace App\Http\Controllers;

use App\Models\Vinculo;
use Illuminate\Http\Request;

/**
 * Class VinculoController
 * @package App\Http\Controllers
 */
class VinculoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vinculos = Vinculo::paginate();

        return view('vinculo.index', compact('vinculos'))
            ->with('i', (request()->input('page', 1) - 1) * $vinculos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $vinculo = new Vinculo();
        return view('vinculo.create', compact('vinculo'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Vinculo::$rules);

        $vinculo = Vinculo::create($request->all());

        return redirect()->route('vinculos.index')
            ->with('success', 'Vinculo created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $vinculo = Vinculo::find($id);

        return view('vinculo.show', compact('vinculo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $vinculo = Vinculo::find($id);

        return view('vinculo.edit', compact('vinculo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Vinculo $vinculo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vinculo $vinculo)
    {
        request()->validate(Vinculo::$rules);

        $vinculo->update($request->all());

        return redirect()->route('vinculos.index')
            ->with('success', 'Vinculo updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $vinculo = Vinculo::find($id)->delete();

        return redirect()->route('vinculos.index')
            ->with('success', 'Vinculo deleted successfully');
    }
}
