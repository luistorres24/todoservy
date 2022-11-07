<?php

namespace App\Http\Controllers;

use App\Http\Requests\CalificacionRequest;
use App\Http\Requests\EditarNegocioRequest;
use App\Http\Requests\NegocioRequest;
use App\Models\Calificacion;
use App\Models\Negocio;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NegociosController extends Controller
{

    public function traerNegocios(){

       $listado_negocios = Negocio::get();

        return response()->json($listado_negocios);
    }

    public function mostrarNegocio(Negocio $negocio){
        return view('negocio', compact('negocio'));
    }

    public function traerCalificacion(Request $request){

        $calificaciones = Calificacion::where('id_negocio', $request->id)->get();

        $total_calificaciones = 0;

        foreach($calificaciones as $calificacion){
            $total_calificaciones += $calificacion->calificacion;
        }
        $promedio = $total_calificaciones/count($calificaciones);

        return response()->json([
           'calificaciones' => $calificaciones,
           'total_calificaciones' => count($calificaciones),
           'promedio_calificaciones' => round($promedio,1),
        ]);

    }

    public function crearCalificacion(CalificacionRequest $request)
    {
        Calificacion::create([
            'id_negocio'   => $request->id_negocio,
            'nombre'       => $request->nombre,
            'comentario'   => $request->comentario,
            'calificacion' => $request->calificacion,
        ]);

        return response()->json('Calificacion creada correctamente');
    }

    public function crearNegocio(NegocioRequest $request)
    {

        $negocio = Negocio::create([
            'nombre' => $request->nombre,
            'acerca_de' => $request->acerca_de,
            'telefono' => $request->telefono,
            'foto' => 'default',
        ]);

        if(!$this->guardarFoto($negocio, $request->foto)){
            $negocio->delete();
            return response()->json('No se ha podido guardar la foto', 422);
        }

        return response()->json('Negocio creado correctamente');
    }

    public function editarNegocio(EditarNegocioRequest $request, Negocio $negocio)
    {

        $negocio->nombre = $request->nombre;
        $negocio->acerca_de = $request->acerca_de;
        $negocio->telefono = $request->telefono;
        $negocio->save();

        if(!$this->guardarFoto($negocio, $request->foto)){
            return response()->json('No se ha podido guardar la foto', 422);
        }

        return response()->json('Negocio editado correctamente');
    }

    public function eliminarNegocio(Negocio $negocio)
    {

        $negocio->delete();

        return response()->json('Negocio eliminado');
    }

    private function guardarFoto($negocio, $foto){
        try {

            $archivo = $foto;

            $extension = explode('/', explode(':', substr($archivo, 0, strpos($archivo, ';')))[1])[1];   // .jpg .png .pdf
            $replace = substr($archivo, 0, strpos($archivo, ',')+1);

            $image = str_replace($replace, '', $archivo);
            $image = str_replace(' ', '+', $image);

            $nombreFoto = 'fotos_negocios/fotos_' . $negocio->id . '.' . $extension;
            $imageName = $nombreFoto;

            Storage::disk('fotos')->put($imageName, base64_decode($image));
            $negocio->foto = $imageName;
            $negocio->save();


        }catch (Exception $exception){
            return false;
        }

        return true;
    }




}
