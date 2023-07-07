<?php

use App\Http\Controllers\GeneralController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\FacturaController;
use App\Http\Controllers\ArchivosController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\EmpresaEmisoraController;
use App\Http\Controllers\EmpresaReceptoraController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/',[GeneralController::class,'index']);

//Ruta para redireccionar al login
Route::get('/login', [LoginController::class, 'index'])->name('login');
//Ruta para el login de los administradores
Route::post('/login', [LoginController::class, 'store']);

//Ruta para la vista de registro de usuario
Route::get('/register', [RegisterController::class, 'index'])->name('register');
//Ruta para registrar usuarios
Route::post('/register', [RegisterController::class, 'store']);

// Rutas para la gestión después del login
Route::get('/dashboard', [PostController::class, 'index'])->name('post.index');

//Ruta para cerrar sesión
Route::post('/logout', [LogoutController::class, 'store'])->name('logout');

//Ruta para ir a la vista de Empresas receptoras
Route::get('/EmpresasReceptora', [EmpresaReceptoraController::class, 'index'])->name('receptora.index');

//Ruta para ir a la vista de crear Empresas receptoras
Route::get('/AgregarReceptora', [EmpresaReceptoraController::class, 'create'])->name('receptora.create');
//Ruta para crear una empresa receptora en la base de datos
Route::post('/AgregarReceptora', [EmpresaReceptoraController::class, 'store']);
//Ruta para eliminar a una empresa receptora
Route::get('/eliminarReceptora/{id_receptora}', [EmpresaReceptoraController::class, 'delete'])->name('receptora.eliminar');

//Ruta para ir a la vista de Empresas emisora
Route::get('/EmpresasEmisoras', [EmpresaEmisoraController::class, 'index'])->name('emisora.index');

//Ruta para ir a la vista de crear Empresas emisora
Route::get('/AgregarEmisora', [EmpresaEmisoraController::class, 'create'])->name('emisora.create');
//Ruta para agregar la empresa emisora
Route::post('/AgregarEmisora', [EmpresaEmisoraController::class, 'store']);
//Ruta para eliminar a una empresa emisora
Route::get('/eliminarEmisora/{id_emisora}', [EmpresaEmisoraController::class, 'delete'])->name('emisora.eliminar');


//Ruta para ver la vista de facturas
Route::get('/Facturas', [FacturaController::class, 'index'])->name('factura.index');

//Ruta para ver la vista de agregar facturas
Route::get('/AgregarFactura', [FacturaController::class, 'create'])->name('factura.create');
//Ruta para insertar los datos en la tabla de facturas
Route::post('/AgregarFactura', [FacturaController::class, 'store'])->name('factura.store');
//Ruta para eliminar la factura
Route::get('/eliminarFactura/{id_factura}',[FacturaController::class, 'delete'])->name('factura.eliminar');

//Ruta para la carga de archivos
Route::post('/pdf',[ArchivosController::class,'storePDF'])->name('archivos.pdf');
Route::post('/xml',[ArchivosController::class,'storeXML'])->name('archivos.xml');
//Ruta para descargar los archivos de la tabla
Route::get('/download/{file}',[ArchivosController::class,'download'])->name('archivos.download');

//Ruta para buscar factura
Route::post('/buscarFactura',[GeneralController::class,'search'])->name('factura.buscar');
