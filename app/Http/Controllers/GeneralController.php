<?php

namespace App\Http\Controllers;

use App\Models\Emisora;
use App\Models\Factura;
use App\Models\Receptora;
use Illuminate\Http\Request;

class GeneralController extends Controller
{
    //Funcion para redireccionar a la pagina principal
    public function index(){
        //Se instancia a los modelos para obtener todos los datos
        $emisoras=Emisora::all();
        $receptoras=Receptora::all();
        return view('welcome',['emisoras'=>$emisoras,'receptoras'=>$receptoras]);
    }

    //Ruta para buscar la factura
    public function search(Request $request){
        //Validaciones de formulario
        $this->validate($request,[
            'emisora'=>'required',
            'receptora'=>'required',
        ]);

        //Se verifica si buscó con factura
        if($request->folio==null){
            //Se hace la consulta para obtener 
            $factura=Factura::with('empresaEmisora','empresaReceptora')
                            ->where('emisora_id',$request->emisora)
                            ->where('receptora_id',$request->receptora)
                            ->get();
        }else{
            $factura=Factura::with('empresaEmisora','empresaReceptora')
                            ->where('emisora_id',$request->emisora)
                            ->where('receptora_id',$request->receptora)
                            ->where('folio',$request->folio)
                            ->get();
        }

        return view('facturasGeneral',['facturas'=>$factura]);
    }
}
