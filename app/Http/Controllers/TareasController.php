<?php

namespace App\Http\Controllers;

use App\Models\Tareas;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class TareasController extends Controller
{
    public function Buscar($id){
        try{
            $tarea = Tareas::findOrFail($id);
            return response() ->json($tarea);
        }catch (ModelNotFoundException $exception) {
            return response()->json(['error' => 'Tarea no encontrada'], 404);
        }
    }
    
    
    public function ObtenerTodas(){
        return Tarea::all();
    }


    public function BuscarPorAutor($autor){
        try{
            $tareas = Tareas::all();
            $tareasDeAutor = $tareas -> $autor;
            return $tareasDeAutor;
        }catch (ModelNotFoundException $exception) {
            return response()->json(['error' => 'Tareas no encontradas'], 404);
        }
    }

    public function BuscarPorTitulo($titulo){
        try{
            $tareas = Tareas::all();
            $titulosDeTareas = $tareas -> $titulo;
            return $titulosDeTareas;
        }catch (ModelNotFoundException $exception) {
            return response()->json(['error' => 'Tareas no encontradas'], 404);
        }
    }
}
