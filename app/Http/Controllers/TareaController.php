<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tarea;
use Validator;

class TareaController extends Controller
{
    public function crearTarea(Request $request) {
        $validator = Validator::make($request->all(), [
            'Titulo' => 'string|required',
            'Contenido' => 'string|required',
            'Estado' => 'string|required',
            'autor' => 'string|required'
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        }
        $tarea = Tarea::create($request->all());
        return response()->json(['Tarea creada' => $tarea]);
    }

    public function listarTareas() {
        $tareas = Tarea::all();
        return response()->json(['Tareas' => $tareas]);
    }

    public function buscarTarea($id) {
        $tarea = Tarea::find($id);
        if(!$tarea) {
            return "No se encontro una tarea con el id" . $id;
        }
        return response()->json(['Tarea' => $tarea]);
    }
}
