<?php

namespace App\Http\Controllers;

use App\Models\Emisora;
use Illuminate\Http\Request;

class EmpresaEmisoraController extends Controller
{
    
    //Constructor para validar usuario autentificado
    public function __construct()
    {
        // Para verificar que el user este autenticado
        // except() es para indicar cuales metodos pueden usarse sin autenticarse
        $this->middleware('auth');
    }
    //Funcion para retornar la vista de empresas emisoras
    public function index()
    {
        //Se verifica que haya empresas emisoras en la base de datos
        $emisoras = Emisora::all();
        return view('EmpresasEmisoras.EmpEmisoras', ['emisoras' => $emisoras]);
    }

    public function store(Request $request)
    {
        //Se valida el formulario de las emoresas emisoras
        $this->validate($request, [
            'nombre' => 'required',
            'razon_social' => 'required',
            'rfc' => 'required',
            'email' => 'required|email'
        ]);

        //Se hace la insersión a la tabla de Emisoras 
        Emisora::create([
            'nombre' => $request->nombre,
            'razon_social' => $request->razon_social,
            'rfc' => $request->rfc,
            'correo_contacto' => $request->email
        ]);

        return redirect()->route('emisora.index');


    }

    //Retorna la vista de formulario para agregar empresa receptora
    public function create()
    {
        return view('EmpresasEmisoras.newEmisoras');
    }

    //Funcion para eliminar a una empresa emisora
    public function delete($id_emisora){
        //Sentencia para eliminar la factura
        $eliminar_emisora = Emisora::find($id_emisora)->delete();

        return back();
    }
}