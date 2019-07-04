<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pago;
use App\Padrino;
use App\TiposPago;
use App\DetallesPago;
use Carbon\Carbon;

class AportesController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
        Carbon::setLocale('es');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pagos = Pago::all();

        return view('aportes.index', compact('pagos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $padrinos = Padrino::all();
        $tipos = TiposPago::all();

        return view('aportes.create', compact('padrinos', 'tipos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'monto_pago' => 'required|numeric',
            'padrino_id' => 'required',
            'fecha_pago' => 'required',
            'tipo_pago_id' => 'required',
            'factura' => 'required|numeric',
            'comprobante' => 'required|numeric',
            'descripcion' => 'required',
        ],[
            'padrino_id.required' => 'Debe elegir un padrino',
            'tipo_pago_id.required' => 'Debe elegir un medio de pago',
        ]);

        $data = $request->all();

        DetallesPago::create([
            'tipo_pago_id' => $data['tipo_pago_id'],
            'factura' => $data['factura'],
            'comprobante' => $data['comprobante'],
            'descripcion' => $data['descripcion'],
        ]);

        Pago::create([
            'monto_pago' => $data['monto_pago'],
            'detalle_pago_id' => DetallesPago::latest()->first()->id,
            'padrino_id' => $data['padrino_id'],
            'fecha_pago' => $data['fecha_pago'],
            'user_id' => \Auth::user()->id,
        ]);

        return redirect()->route('aportes.index')->with('info', 'Aporte creado!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
