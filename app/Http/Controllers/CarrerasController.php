<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Carreras;

class CarrerasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $carreras = Carreras::all();
        return view('carreras',compact('carreras'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $carrera = new Carreras($request->input());
        $carrera->saveOrFail();
        return redirect('carreras');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $carrera = Carreras::find($id);
        return view('ceditCarrera',compact('carreras'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $carrera = Carreras::find($id);
        $carrera->fill($request->input())->saveOrFail();
        return redirect('carreras');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $carrera = Carreras::find($id);
        $carrera->delete();
        return redirect('carreras');
    }
}
