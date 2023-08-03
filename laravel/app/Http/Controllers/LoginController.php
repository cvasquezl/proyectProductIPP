<?php
namespace App\Http\Controllers;

use App\Models\User;

class LoginController extends Controller
{
    public function login()
    {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $user = User::getUserByEmailAndPassword($email, $password);

        if ($user) {
            return redirect()->route('consulta');
        } else {
            return redirect()->route('register');
        }
    }
}
