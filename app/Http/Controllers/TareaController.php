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

    public function eliminarTarea($id) {
        $tarea = Tarea::find($id);
        if(!$tarea) {
            return "No se encontro una tarea con el id" . $id;
        }
        $tarea->delete();
        return response()->json(['Tarea eliminada' => $tarea]);
    }

    public function buscarTareaPorTitulo(Request $request) {
        $tarea = Tarea::where('Titulo', $request->Titulo)->first();
        if(!$tarea) {
            return "No se encontro una tarea con el titulo" . $request->Titulo;
        }
        return response()->json(['Tarea' => $tarea]);
    }

    public function buscarTareaPorAutor(Request $request) {
        $tarea = Tarea::where('autor', $request->autor);
        if(!$tarea) {
            return "No se encontraron tareas con el autor" . $request->autor;
        }
        return response()->json(['Tareas' => $tarea]);
    }

    public function buscarTareaPorEstado(Request $request) {
        $tarea = Tarea::where('Estado', $request->Estado);
        if(!$tarea) {
            return "No se encontraron taresa con el estado" . $request->Estado;
        }
        return response()->json(['Tareas' => $tarea]);
    }
}
