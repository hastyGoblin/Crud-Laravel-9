<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alumnos;
use App\Models\Carreras;

class AlumnosController extends Controller
{
    public function index()
    {
        // $alumnos = Alumnos::all();
        $alumnos = Alumnos::select('alumnos.id','nombre','correo','carrera') //llamamos a todos los datos
        ->join('carreras','carreras.id','=','alumnos.fk_carrera')->get(); //Hacemos un join con la tabla de carreras ya que en la linea de arriba queremos el nombre del campo carrera
        $carreras = Carreras::all();
        return view('alumnos',compact('alumnos','carreras'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $alumno = new Alumnos($request->input());
        $alumno->saveOrFail();
        return redirect('alumnos');
    }

    public function show($id)
    {
        $alumno = Alumnos::find($id); //es como si hicieramos un select* from where id=id etc etc+
        $carrera = Carreras::find($id);
        return view('editAlumno', compact('alumno','carrera'));
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $alumno = Alumnos::find($id);
        $alumno->fill($request->input())->saveOrFail();
        return redirect('alumnos');
    }

    public function destroy($id)
    {
        $alumno = Alumnos::find($id);
        $alumno->delete();
        return redirect('alumnos');
    }
}
