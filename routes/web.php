<?php

use Illuminate\Support\Facades\Route;
use app\Http\Controllers\Controller;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Rutas en general
Route::get('/', function(){
    return view('login');
});





//AUTH
Auth::routes();

//Inicio
Route::get('/home', 'HomeController@index')->name('home');

//Registro
Route::get('/registrar', 'AdminController@registrar')->name('registrar');
Route::post('/registrar', 'AdminController@postRegistrar');
Route::get('/registrarEmpresa', 'AdminController@registrarEmpresa')->name('registrarEmpresa'); 
Route::post('/registrarEmpresa', 'AdminController@postRegistrarEmpresa')->name('registrarEmpresaPost');

//Login
Route::post('/login', 'AdminController@postLogin')->name('loginPost');

//Logout
Route::post('/', 'AdminController@logout')->name('logout');


//Panel de opciones
Route::get('/userAdmin', 'AdminController@UserAdmin')->name('userAdmin');
Route::get('/userCompany', 'AdminController@userCompany')->name('userCompany');
Route::get('/dc3Documents', 'AdminController@dc3Documents')->name('dc3Documents');

//Editar usuarios
Route::get('/editUser/{id}', 'AdminController@editUser')->name('editUser');
Route::post('/editUser/{id}', 'AdminController@postEditUser')->name('postEditUser');
Route::post('deactivate/{id}', 'AdminController@deactivateUser')->name('deactivateUser');

Route::get('/editCompany/{id}', 'AdminController@editCompany')->name('editCompany');
Route::post('/editCompany/{id}', 'AdminController@postEditCompany')->name('postEditCompany');
Route::get('/deleteCompany/{id}', 'AdminController@deleteCompany')->name('deleteCompany');


//Archivos
Route::get('/files', 'AdminController@files')->name('uploadFiles');
Route::post('/files', 'AdminController@uploadFiles')->name('uploadFilesPost');
Route::get('/showFiles', 'AdminController@showFiles')->name('showFiles');
Route::get('/donwloadFile/{path}', 'AdminController@downloadFile')->name('downloadFile');
Route::get('/delteFile/{path}', 'AdminController@deleteFile')->name('deleteFile');

//DC3
//Generar dc3
Route::post('/generateDocument', 'AdminController@GenerateDocument')->name('GenerateDocument');
Route::get('/downloadPDF', 'AdminController@downloadPDF')->name('downloadPDF');
Route::get('/getDc3Master/{id}', 'AdminController@getDc3Master')->name('getDc3Master');

//Consultar dc3
Route::get('/ViewDc3', 'AdminController@viewDc3')->name('viewDc3');
Route::get('/MostrarDc3', 'AdminController@MostrarDc3')->name('MostrarDc3');
Route::get('/Dc3porEmpresa', 'AdminController@Dc3porEmpresa')->name('Dc3porEmpresa');

//Descargar dc3
Route::get('/donwloadDc3/{path}',  'AdminController@downloadPdf')->name('downloadPdf');

//Borrar dc3
Route::get('/deletePdf/{path}', 'AdminController@deletePdf')->name('deletePdf');


//FACTURACION
Route::get('/generarFactura', 'AdminController@generarFactura')->name('generarFactura');
Route::post('/sendBill', 'AdminController@sendBill')->name('sendBill');