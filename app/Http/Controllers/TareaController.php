<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tarea;
use Validator;

class TareaController extends Controller
{
    public function crearTarea(Request $request) {
        $validator = Validator::make($request->all(), [
            'Titulo' => 'required',
            'Contenido' => 'required',
            'Estado' => 'required',
            'autor' => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        }
        $tarea = Tarea::create($request->all());
        return response()->json(['Tarea creada' => $tarea]);
    }
}
