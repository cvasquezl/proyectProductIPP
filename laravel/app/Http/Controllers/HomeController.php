<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Parrafo;
use App\Models\Imagen;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        if ($request->isMethod('post')) {
            $nombre = $request->input('nombre');
            $edad = $request->input('edad');
            $interes = $request->has('interes') ? false : true;

            // Obtener todos los párrafos
            $parrafos = Parrafo::getAllParrafos();

            // Obtener todas las imágenes
            $imagenes = Imagen::getAllImagenes();

            if ($edad >= 18) {
                $parrafosMostrados = array_slice($parrafos, 0, 5);
            } else {
                $parrafosMostrados = array_slice($parrafos, 5, 5);
            }

            $imagenesGrupo1 = array_slice($imagenes, 1, 3);
            $imagenesGrupo2 = array_slice($imagenes, 4, 2);
            $imagenesGrupo3 = array_slice($imagenes, 6, 3);

            // Pasar los datos a la vista
            return view('home', [
                'parrafosMostrados' => $parrafosMostrados,
                'imagen' => $imagenes[0],
                'imagenesGrupo1' => $imagenesGrupo1,
                'imagenesGrupo2'=> $imagenesGrupo2,
                'imagenesGrupo3'=> $imagenesGrupo3,
                'interes'=> $interes
            ]);
        } else {
            return view('home');
        }
    }
}
