<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'PrincipalController@principal')
    ->name('site.index');
Route::get('/sobre', 'SobreController@sobre')->name('site.sobre');
Route::get('/contato', 'ContatoController@contato')->name('site.contato');
Route::post('/contato', 'ContatoController@salvar')->name('site.contato');
Route::get('/login/{erro?}', 'LoginController@index')->name('site.login');
Route::post('/login', 'LoginController@autenticar')->name('site.login');


Route::middleware('autenticacao')->prefix('app')->group(function () {
    Route::get('/clientes', 'ContatoController@contato')->name('app.clientes');
    Route::get('/fornecedores', 'FornecedorController@index')->name('app.fornecedores');
    Route::get('/produtos', 'ContatoController@contato')->name('app.produtos');
});

Route::fallback(function () {
    echo 'Rota inexistente. <a href="'.route('site.index').'">Clique aqui<a/> para voltar à pagina inicial.';
});
