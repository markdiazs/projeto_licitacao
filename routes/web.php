<?php

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

use App\Http\Controllers\ControladorCategoria;
use App\Http\Controllers\LicitacaoController;
use Illuminate\Support\Facades\Route;

Route::get('/','LicitacaoController@index');
Route::get('/novalicitacao','LicitacaoController@create');
Route::post('/novalicitacao/store','LicitacaoController@store');
Route::get('/busca','LicitacaoController@busca');
Route::get('/licitacao/{id}','LicitacaoController@consulta');
Route::get('/download/{id}','LicitacaoController@baixarArquivo');

// //Departaments

// Route::get('/categorias','ControladorCategoria@index');
// Route::get('/categorias/novo','ControladorCategoria@create');
// Route::post('/categorias','ControladorCategoria@store');
// Route::get('/categorias/{id}','ControladorCategoria@edit');
// Route::post('/categorias/{id}','ControladorCategoria@update');
// Route::get('/categorias/apagar/{id}','ControladorCategoria@destroy');


// // Products

// Route::get('/produtos','ControladorProduto@index');
// Route::get('/produtos/novo','ControladorProduto@create');
// Route::post('/produtos','ControladorProduto@store');
// Route::get('/produtos/{id}','ControladorProduto@edit');
// Route::post('/produtos/{id}','ControladorProduto@update');
// Route::get('/produtos/apagar/{id}','ControladorProduto@destroy');

//licitacoes

// Route::get('/','LicitacaoController@index');