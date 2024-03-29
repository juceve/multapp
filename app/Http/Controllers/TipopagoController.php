<?php

namespace App\Http\Controllers;

use App\Models\Tipopago;
use Illuminate\Http\Request;

/**
 * Class TipopagoController
 * @package App\Http\Controllers
 */
class TipopagoController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin.tipopagos.index')->only('index');
        $this->middleware('can:admin.tipopagos.create')->only('create', 'store');
        $this->middleware('can:admin.tipopagos.edit')->only('edit', 'update');
        $this->middleware('can:admin.tipopagos.destroy')->only('destroy');
    }

    public function index()
    {
        $tipopagos = Tipopago::all();

        return view('tipopago.index', compact('tipopagos'))
            ->with('i', 0);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipopago = new Tipopago();
        return view('tipopago.create', compact('tipopago'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Tipopago::$rules);

        $tipopago = Tipopago::create($request->all());

        return redirect()->route('tipopagos.index')
            ->with('success', 'Tipo de pago creado correctamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tipopago = Tipopago::find($id);

        return view('tipopago.show', compact('tipopago'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tipopago = Tipopago::find($id);

        return view('tipopago.edit', compact('tipopago'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Tipopago $tipopago
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tipopago $tipopago)
    {
        request()->validate(Tipopago::$rules);

        $tipopago->update($request->all());

        return redirect()->route('tipopagos.index')
            ->with('success', 'Tipo de pago editado correctamente');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $tipopago = Tipopago::find($id)->delete();

        return redirect()->route('tipopagos.index')
            ->with('success', 'Tipo de pago eliminado correctamente');
    }
}
