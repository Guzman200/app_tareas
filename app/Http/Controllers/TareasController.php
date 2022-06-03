<?php

namespace App\Http\Controllers;

use App\Http\Requests\Tarea\StoreRequest;
use App\Models\Tarea;
use Illuminate\Http\Request;

class TareasController extends Controller
{
    
    public function index()
    {
        $tareas = Tarea::with('categoria')->where('user_id', auth()->user()->id)->get();

        return response()->json($tareas);
    }

    public function store(StoreRequest $request)
    {

        $data = $request->all();
        $data['user_id'] = auth()->user()->id;

        Tarea::create($data);

        return response()->json(['title' => 'Tarea creada exitosamente']);
    }

    public function update(StoreRequest $request, Tarea $tarea)
    {
        $tarea->update($request->all());

        return response()->json(['title' => 'Tarea editada exitosamente']);
    }

    public function marcarComoRealizada(Tarea $tarea)
    {
        $tarea->realizada = 1;
        $tarea->update();

        return response()->json(['title' => 'Tarea marcada como realizada exitosamente']);
    }

    public function delete(Tarea $tarea)
    {
        $tarea->delete();

        return response()->json(['title' => 'Tarea eliminada exitosamente']);
    }

    public function show(Tarea $tarea)
    {
        return response()->json($tarea);
    }
}
