<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Carreras;

class CarrerasController extends Controller
{

    public function index()
    {
        $carreras = Carreras::all(); //llamamos a todos los datos
        return view('carreras',compact('carreras'));
    }

    public function create()
    {
        //
    }

    // En este apartado hace la función de guardar cuando se abre el modal de añadir carrrera (store es donde se almacena en la base de datos)
    public function store(Request $request)
    {
        $carrera = new Carreras($request->input());
        $carrera->saveOrFail();
        return redirect('carreras');
    }

    public function show($id)
    {
        $carrera = Carreras::find($id); //es como si hicieramos un select* from where id=id etc etc
        return view('editCarrera', compact('carrera'));
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $carrera = Carreras::find($id);
        $carrera->fill($request->input())->saveOrFail();
        return redirect('carreras');
    }

    public function destroy($id)
    {
        $carrera = Carreras::find($id);
        $carrera->delete();
        return redirect('carreras');
    }
}
