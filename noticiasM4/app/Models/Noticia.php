<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Noticia extends Model
{
    use HasFactory;

     /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'noticias';
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;
    protected $fillable = ['titulo', 'articulo', 'imagen'];

    public static function getAllNoticias()
    {
        return self::all();
    }

    public static function actualizarNoticia($id, $data)
    {
        $noticia = Noticia::find($id);
        if ($noticia) {
            $noticia->update($data);
        }
    }

    public static function crearNoticia($data)
    {
        return Noticia::create($data);
    }

    public static function eliminarNoticia($id)
    {
        return Noticia::destroy($id);
    }
    
}
