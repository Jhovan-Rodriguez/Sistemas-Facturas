<?php

namespace App\Http\Controllers;

use App\Models\Emisora;
use App\Models\Factura;
use App\Models\Receptora;
use Illuminate\Http\Request;

class FacturaController extends Controller
{

    //Constructor para validar usuario autentificado
    public function __construct()
    {
        // Para verificar que el user este autenticado
        // except() es para indicar cuales metodos pueden usarse sin autenticarse
        $this->middleware('auth');
    }

    //Funcion para redireccionar a la vista de facturas
    public function index(){
        //Se instancia a los modelos para obtener todos los datos
        $facturas=Factura::with('empresaEmisora','empresaReceptora')->get();

        return view('Facturas.facturas',['facturas'=>$facturas]);
    }

    //Funcion para retornar a la vista de agregar facturas
    public function create(){
        //Se hacen una instancia a los modelos de las empresas
        $receptoras=Receptora::all();
        $emisoras=Emisora::all();
        return view('Facturas.agregarFactura',['receptoras'=>$receptoras,'emisoras'=>$emisoras]);
    }

    //Funcion para insertar los datos de la factura en su respectiva tabla
    public function store(Request $request){
        //Validaciones de formulario
        $this->validate($request,[
            'emisora'=>'required',
            'receptora'=>'required',
            'folio'=>'required',
            'pdf'=>'required',
            'xml'=>'required'
        ]);
        //Se insertan los valores a la tabla facturas
        Factura::create([
            'emisora_id'=>$request->emisora,
            'receptora_id'=>$request->receptora,
            'folio'=>$request->folio,
            'pdf'=>$request->pdf,
            'xml'=>$request->xml

        ]);

        return redirect()->route('factura.index');
    }

    //Funcion para eliminar la factura de la base de datos
    public function delete($id_factura){
        //Sentencia para eliminar la factura
        $eliminar_factura = Factura::find($id_factura)->delete();

        return back();
    }


}
