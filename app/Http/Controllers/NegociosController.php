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
use function PHPUnit\Framework\isEmpty;

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

        $total_calificaciones = count($calificaciones);
        $total_acumulado_calificaciones = 0;
        $promedio = 0;

        if($total_calificaciones > 0){
            foreach($calificaciones as $calificacion){
                $total_acumulado_calificaciones += $calificacion->calificacion;
            }
            $promedio = $total_acumulado_calificaciones/$total_calificaciones;
        }


        return response()->json([
           'calificaciones' => $calificaciones,
           'total_calificaciones' => $total_calificaciones,
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
        if($request->foto == null){
            return response()->json([
                'errors' => [
                    'foto' => ['Debe agregar una foto']
                ]
            ], 422);
        }

        $negocio = Negocio::create([
            'nombre' => $request->nombre,
            'acerca_de' => $request->acerca_de,
            'telefono' => $request->telefono,
            'foto' => 'default',
        ]);

        if(!$this->guardarFoto($negocio, $request->foto)){
            $negocio->delete();
            return response()->json([
                'errors' => [
                    'foto' => ['No se ha podido guardar la foto']
                ]
            ], 422);
        }

        return response()->json('Negocio creado correctamente');
    }

    public function editarNegocio(EditarNegocioRequest $request, Negocio $negocio)
    {

        if($request->foto == null){
            return response()->json([
                'errors' => [
                    'foto' => ['Debe agregar una foto']
                ]
            ], 422);
        }

        $negocio->nombre = $request->nombre;
        $negocio->acerca_de = $request->acerca_de;
        $negocio->telefono = $request->telefono;
        $negocio->save();

        if($request->foto_original == 'false')
        if(!$this->guardarFoto($negocio, $request->foto)){
            return response()->json([
                'errors' => [
                    'foto' => ['No se ha podido guardar la foto']
                ]
            ], 422);
        }

        return response()->json('Negocio editado correctamente');
    }

    public function eliminarNegocio(Negocio $negocio)
    {
        $calificaciones = Calificacion::where('id_negocio', $negocio->id)->get();

        foreach($calificaciones as $calificacion){
            $calificacion->delete();
        }

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
