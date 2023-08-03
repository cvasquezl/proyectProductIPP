<?php

namespace App\Http\Controllers;

use App\Models\Noticia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NoticiaController extends Controller
{
    public function index()
    {
        $noticias = Noticia::getAllNoticias();
        return view('noticias', ['noticias_result' => $noticias]);
    }

    public function crear(Request $request)
    {
        $data = [
            'titulo' => $request->input('titulo'),
            'articulo' => $request->input('articulo'),
        ];
        if ($request->hasFile('imagen')) {
            $imagen = $request->file('imagen');
            $nombreImagen = time() . '.' . $imagen->getClientOriginalExtension();
            Storage::disk('public')->put('images/' . $nombreImagen, file_get_contents($imagen));
            $data['imagen'] = 'storage/images/' . $nombreImagen;
        }
        Noticia::crearNoticia($data);
        return redirect()->route('noticias');
    }

    public function mostrarCrear()
    {
        return view('crear');
    }

    public function actualizar(Request $request)
    {
        $id = $request->input('id');
        $data = [
            'titulo' => $request->input('titulo'),
            'articulo' => $request->input('articulo'),
        ];
        if ($request->hasFile('imagen')) {
            $imagen = $request->file('imagen');
            $nombreImagen = time() . '.' . $imagen->getClientOriginalExtension();
            Storage::disk('public')->put('images/' . $nombreImagen, file_get_contents($imagen));
            $data['imagen'] = 'storage/images/' . $nombreImagen;
        }
        Noticia::actualizarNoticia($id, $data);
        return redirect()->route('noticias');
    }

    public function mostrarActualizar($id)
    {
        $noticia = Noticia::find($id);
        if ($noticia) {
            return view('actualizar', [
                'id' => $noticia->id,
                'titulo' => $noticia->titulo,
                'articulo' => $noticia->articulo,
            ]);
        }
    }

    public function eliminar(Request $request)
    {
        $id = $request->input('noticia_id');
        Noticia::eliminarNoticia($id);
        return redirect()->route('noticias');
    }
}
