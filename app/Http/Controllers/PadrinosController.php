<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Padrino;
use App\Domicilio;
use App\Alumno;
use App\Vinculacione;

class PadrinosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $padrinos = Padrino::all();
        return view('padrinos.index', compact('padrinos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $alumnos = \DB::select (\DB::raw("SELECT * FROM alumnos WHERE NOT EXISTS (SELECT * FROM vinculaciones WHERE vinculaciones.alumno_id = alumnos.id)"));

        // $alumnos = Alumno::all();
        // $vinculaciones = Vinculacione::all();

        // dd($alumnos);

        return view('padrinos.create', compact('alumnos'));
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
            'nombre' => 'required',
            'apellido' => 'required',
            'dni' => 'required|numeric|digits_between:8,10',
            'cuil' => 'required|numeric|digits_between:11,13',
            'email' => 'required|email',
            'telefono' => 'required|numeric',
            'segundo_telefono' => 'numeric',
            'contacto' => 'required',
            'calle' => 'required',
            'numero' => 'required|numeric',
            'provincia' => 'required',
            'ciudad' => 'required',
            'piso' => 'numeric',
        ]);

        $data = $request->all();

        Domicilio::create([
            'calle' => $data['calle'],
            'numero' => $data['numero'],
            'provincia' => $data['provincia'],
            'ciudad' => $data['ciudad'],
            'dpto' => $data['dpto'],
            'piso' => $data['piso'],
        ]);

        if ($request['checklist']) {
            $data['checklist'] = 1;
        }else{
            $data['checklist'] = 0;
        }

        Padrino::create([
            'nombre' => $data['nombre'],
            'apellido' => $data['apellido'],
            'alias' => $data['alias'],
            'dni' => $data['dni'],
            'cuil' => $data['cuil'],
            'email' => $data['email'],
            'segundo_email' => $data['segundo_email'],
            'telefono' => $data['telefono'],
            'segundo_telefono' => $data['segundo_telefono'],
            'contacto' => $data['contacto'],
            'domicilio_id' => Domicilio::latest()->first()->id,
            'checklist' => $data['checklist'],
        ]);

        return redirect()->route('padrinos.index')->with('info', 'Padrino creado!');

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
