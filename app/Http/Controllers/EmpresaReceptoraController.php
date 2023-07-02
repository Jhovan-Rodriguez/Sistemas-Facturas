<?php

namespace App\Http\Controllers;

use App\Models\Receptora;
use Illuminate\Http\Request;

class EmpresaReceptoraController extends Controller
{
    //Constructor para validar usuario autentificado
    public function __construct()
    {
        // Para verificar que el user este autenticado
        // except() es para indicar cuales metodos pueden usarse sin autenticarse
        $this->middleware('auth');
    }
    
    //Ruta para la vista de empresas receptoras
    public function index(){
        $receptoras=Receptora::all();
        return view('EmpresasReceptoras.EmpReceptoras',['receptoras'=>$receptoras]);
    }

    //Retorna la vista de formulario para agregar empresa receptora
    public function create(){
        return view('EmpresasReceptoras.newReceptora');
    }
    //Funcion para insertar empresas receptoras a su respectiva tabla
    public function store(Request $request){
        //Validaciones de los campos
        $this->validate($request,[
            'nombre'=>'required',
            'direccion'=>'required',
            'rfc'=>'required',
            'contacto'=>'required',
            'email'=>'required|email'
        ]);

        //Se insertan los datos en la tabla receptoras
        Receptora::create([
            'nombre'=>$request->nombre,
            'direccion'=>$request->direccion,
            'rfc'=>$request->rfc,
            'contacto'=>$request->contacto,
            'email'=>$request->email
        ]);

        return redirect()->route('receptora.index');
    }

        //Funcion para eliminar a una empresa receptora
        public function delete($id_receptora){
            //Sentencia para eliminar la factura
            $eliminar_receptora = Receptora::find($id_receptora)->delete();
    
            return back();
        }
}
