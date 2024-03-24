<?php

namespace App\Http\Controllers;

use App\Models\Sistema;
use Illuminate\Http\Request;

/**
 * Class SistemaController
 * @package App\Http\Controllers
 */
class SistemaController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin.sistemas.index')->only('index');
        $this->middleware('can:admin.sistemas.create')->only('create', 'store');
        $this->middleware('can:admin.sistemas.edit')->only('edit', 'update');
        $this->middleware('can:admin.sistemas.destroy')->only('destroy');
    }

    public function index()
    {
        $sistemas = Sistema::all();

        return view('sistema.index', compact('sistemas'))
            ->with('i', 0);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sistema = new Sistema();
        return view('sistema.create', compact('sistema'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Sistema::$rules);

        $sistema = Sistema::create($request->all());

        return redirect()->route('sistemas.index')
            ->with('success', 'Sistema created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sistema = Sistema::find($id);

        return view('sistema.show', compact('sistema'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sistema = Sistema::find($id);

        return view('sistema.edit', compact('sistema'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Sistema $sistema
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sistema $sistema)
    {
        request()->validate(Sistema::$rules);

        $sistema->update($request->all());

        return redirect()->route('sistemas.index')
            ->with('success', 'Sistema updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $sistema = Sistema::find($id)->delete();

        return redirect()->route('sistemas.index')
            ->with('success', 'Sistema deleted successfully');
    }
}
