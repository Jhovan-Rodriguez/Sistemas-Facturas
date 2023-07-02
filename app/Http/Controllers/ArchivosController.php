<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;


class ArchivosController extends Controller
{
    //Funcion para guardar la imagen en la carpeta uploads
    //public function store(Request $request)
    //{
    //    $imagen = $request->file('file');
    //    // Se genera un ID único para la imagen
    //    $nombreImagen = Str::uuid() . '.' . $imagen->extension();
    //    // Procesa la imagen
    //    #$imagenServidor = Image::make($imagen);
    //    // Recorta la imagen
    //    $imagenPath = public_path('uploads') . '/' . $nombreImagen;
    //    #$imagenServidor->save($imagenPath);
    //    copy($imagen,$imagenPath);
    //    return response()->json([
    //        'imagen' => $nombreImagen
    //    ]);
    //}
    //Constructor para validar usuario autentificado
    public function __construct()
    {
        // Para verificar que el user este autenticado
        // except() es para indicar cuales metodos pueden usarse sin autenticarse
        $this->middleware('auth');
    }
    //Función para almacenar el archivo PDF
    public function storePDF(Request $request)
    {
        $pdf = $request->file('file');
        // Se obtiene el nombre del archivo
        $nombrepdf = $pdf->getClientOriginalName() . '.' . $pdf->extension();
        //Se obtiene el path en donde queremos almecenar el archivo
        $pdfPath = public_path('uploads') . '/' . $nombrepdf;
        //Con la creación del archivo, se coloca en la ruta establecida
        copy($pdf,$pdfPath);

        return response()->json([
            'pdf' => $nombrepdf
        ]);
    }
    //Funcion para almacenar archivos XML    
    public function storeXML(Request $request)
    {
        $xml = $request->file('file');
        // Se obtiene el nombre original del archivo
        $nombrexml = $xml->getClientOriginalName().'.xml';

        //Se obtiene el path en donde queremos almecenar el archivo
        $xmlPath = public_path('uploads') . '/' . $nombrexml;
        //Con la creación del archivo, se coloca en la ruta establecida
        copy($xml,$xmlPath);
        
        return response()->json([
            'xml' => $nombrexml
        ]);
    }

    public function download($file){
        $pathFile = public_path('uploads').'/'.$file;
        return response()->download($pathFile);
    }
}