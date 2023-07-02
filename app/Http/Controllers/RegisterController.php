<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    //Funcion para retornar la vista de registro
    public function index(){
        return view('auth.register');
    }

    //Funcion para registrar usuarios administradores
    public function store(Request $request){
        //Validaciones
        $this->validate($request,[
            'nombre'=>'required',
            'username'=>'required',
            'email'=>'email',
            'password'=>'required'
        ]);
        //Se añade el usuario a la base de datos
        User::create([
            'name'=>$request->nombre,
            'username'=>$request->username,
            'email'=>$request->email,
            'password'=>Hash::make($request->password)
        ]);

        // Otra forma de autenticar
        auth()->attempt($request->only('email', 'password'));

        return redirect()->route('login');
    }
}
