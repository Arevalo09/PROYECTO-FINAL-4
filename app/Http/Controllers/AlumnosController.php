<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alumnos;
use App\Models\Carreras;


class AlumnosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
     /* @return \Illuminate\Http\Response */

    public function index()
    {
        $alumnos = Alumnos::select('alumnos.id','nombre','correo','id_carrera','carrera')->join('carreras','carreras.id', '=','alumnos.id_carrera')->get();
        $carreras = Carreras::all();
        return view('alumnos',compact('alumnos','carreras'));
    }

    /**
     * Show the form for creating a new resource.
     */
     /* @return \Illuminate\Http\Response */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
     /* @param \Illuminate\Http\Request */
     /* @return \Illuminate\Http\Response */

    public function store(Request $request)
    {
        $alumno = new Alumnos($request->input());
        $alumno->saveOrFail();
        return redirect('alumnos');
    }

    /**
     * Display the specified resource.
     */
     /* @param init */
     /* @return \Illuminate\Http\Response */
    
    public function show($id)
    {
        $alumno = Alumnos::find($id);
        return view('editAlumno', compact('alumno','carrera'));
    }

    /**
     * Show the form for editing the specified resource.
     */
     /* @param init */
     /* @return \Illuminate\Http\Response */

    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
     /* @param \Illuminate\Http\Request */
     /* @param init */
     /* @return \Illuminate\Http\Response */
         
    public function update(Request $request, $id)
    {
        $alumno = Alumnos::find($id);
        $alumno->fill($request->input())->saveOrfail();
        return redirect('alumnos');
    }

    /**
     * Remove the specified resource from storage.
     */
     /* @param init */
     /* @return \Illuminate\Http\Response */

    public function destroy($id)
    {
        $alumno = Alumnos::find($id);
        $alumno->delete();
        return redirect('alumnos');
    }
}
