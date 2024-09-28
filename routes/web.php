<?php

use App\Http\Controllers\AdminmantenimientoController;
use App\Http\Controllers\Autenticar;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\RequisicionController;
use FontLib\Table\Type\name;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Stmt\TryCatch;

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
/*
Route::get('/', function () {
    return view('welcome');
});
*/
// la diagonal es para el Login

//estas direcciones funcionan en cascada http://localhost/Proyecto1/public/
Route::get('/', IndexController::class)->name('principal');

//Routa para recibir los datos
Route::post('validacion',[AuthController::class,'IniciarSesion'])->name('validar');

//ruta del menu para decidir que hara despues del login
Route::get('menu',[AuthController::class,'menu'])->name('Tip_Solci');






//ruta que me recibe del postSolicitudMantenimiento antes era post
Route::get('PDF',[AuthController::class,'RecibeInfoParaVistaPDF'])->name('RecibeInfoParaVistaPDF');


Route::post('MuestraPDF',[AuthController::class,'MuestraVistaPDF'])->name('MuestraElPDF');


//ruta simple que muestra los datos PRUEBA
Route::get('Principal',[AuthController::class,'Principal'])-> name ('Principal');





    //ruta que activara el archivo                         metodos del controlador AuthController
Route::get('Autenticar/Registrar',[AuthController::class,'Registrar'])->name('registrar');
Route::post('Autenticar/almacenar',[AuthController::class,'store'])->name('almacenar');
//ruta para eliminar la sesion 
Route::get('logout', [LogoutController::class, 'destroy'])->middleware('auth')->name('CerrarSesion');



Route::get('Mantenimiento/agreServ',[AuthController::class,'servicio'])->name('A_Serv');
//Route::post('Mantenimiento/Almacenar',[AuthController::class,'Alma_orden'])->name('Alma_Orden');


//este codigo es para mandar informacion sobre la url
//Route::get('/Autenticar/Restablecer/{variable}',[AuthController::class,'Restablecer']);
Route::get('Autenticar/Restablecer',[AuthController::class,'Restablecer'])->name('restablecer');

//metodo que recibe el enlace 
Route::post('enlace', [AuthController::class, 'enlace'])->name('enlace');



Route::get('clave/{token}', [AuthController::class, 'clave'])->name('clave');
Route::post('cambiar', [AuthController::class, 'cambiar'])->name('cambiar');


//rutaa para Empezar con las requisiciones

Route::get('Requisision',[RequisicionController::class,'Requisicion'])->name('Requisision');

Route::post('MenuMantRequi',[RequisicionController::class,'MenuMantRequi'])->name('MenuMantRequi');

//esta si esta en uso
Route::get('VistaPDF',[RequisicionController::class,'VistaPDFM'])->name('VistaPDF');
//esta tambien esta en uso
Route::get('DescargarPDF',[RequisicionController::class,'DescargarPDFM'])-> name('DescargarPDF');


//para el lado de las requisiciones
Route::get('ReqVisPDF',[RequisicionController::class,'VistaPDFReq'])->name('VistaRequi');

Route::get('RegVisPDF',[RequisicionController::class,'DescargarPDFRequi'])->name('ReqMuestraVistaPDF');

//estas rutas son para el Administrador Mantenimiento
Route::get('Adminmantenimiento',[AdminmantenimientoController::class,'AdminMant'])->name('AdminMant');

Route::get('Adminmantenimiento/{id}',[AdminmantenimientoController::class,'AdminMantUnico'])->name('AdminMantUnico');