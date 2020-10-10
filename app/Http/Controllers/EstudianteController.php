<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Estudiante;

class EstudianteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $estudiantes = Estudiante::paginate(2);
        return view('estudiantes.index', compact('estudiantes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('estudiantes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {           
        
        $request->validate(['nombre'=>'required', 'nota1'=>'required', 'nota2'=>'required', 'nota3'=>'required']);
        
        Estudiante::create($request->all());
        return redirect()->route('estudiantes.index')->with('mensaje', 'Registro guardado con exito');
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
        $estudiante = Estudiante::find($id);
        return view('estudiantes.edit', compact('estudiante'));
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
        $request->validate(['nombre'=>'required', 'nota1'=>'required', 'nota2'=>'required', 'nota3'=>'required']);
        Estudiante::find($id)->update($request->all());
        return redirect()->route('estudiantes.index')->with('mensaje', 'Registro actualizado con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Estudiante::find($id)->delete();
        return redirect()->route('estudiantes.index')->with('mensaje', 'Registro eliminado con exito');
    }
}
