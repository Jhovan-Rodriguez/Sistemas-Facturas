<?php

namespace App\Http\Controllers;

use App\Models\Factura;
use Illuminate\Http\Request;

class GeneralController extends Controller
{
    //Funcion para redireccionar a la pagina principal
    public function index(){
        //Se instancia a los modelos para obtener todos los datos
        $facturas=Factura::with('empresaEmisora','empresaReceptora')->get();
        return view('welcome',['facturas'=>$facturas]);
    }
}
