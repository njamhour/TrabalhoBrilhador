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

/*Route::get('/', function () {
    return view('index');
});*/

/* MISC */
Route::get('/', 'UsuarioController@home');
Route::get('/layout', 'UsuarioController@layout');

/* USUARIO */
Route::get('/usuarios', 'UsuarioController@index');

/* PRODUTO */
Route::get('/produtos', 'ProdutoController@index');

/* PRODUÇÃO */
Route::get('/producoes', 'ProducaoController@index');

/* PEDIDO */
Route::get('/pedidos', 'PedidoController@index');

/* FORNECEDOR */
Route::get('/fornecedores', 'FornecedorController@index');

/* ESTOQUE */
Route::get('/estoque', 'EstoqueController@index');

/* CATEGORIAS */
Route::get('/categorias', 'CategoriaController@index');

//Route::get('/home', 'UsuarioController@index'); /* CRIAR CONTROLLER PARA HOME */
//Route::resource('usuarios', 'UsuarioController');