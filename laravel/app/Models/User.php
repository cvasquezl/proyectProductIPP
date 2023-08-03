<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Hash;

class User extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'user';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    protected $fillable = [
        'nombre',
        'apellido',
        'email',
        'password',
        'ciudad',
        'genero'
    ];

    public static function getUserByEmailAndPassword($email, $password)
    {
        $user = self::where('email', $email)->first();

        if ($user && Hash::check($password, $user->password)) {
            return $user;
        } else {
            return null;
        }
    }

    public static function createUser($data)
    {
        return self::create([
            'nombre' => $data['nombre'],
            'apellido'=> $data['apellido'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'ciudad' => $data['ciudad'],
            'genero' => $data['genero']
        ]);
    }
}