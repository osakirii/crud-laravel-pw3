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

use App\Models\Cliente;
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/listar', function(){
    return view('listar');
});

Route::get('/editar', function(){
    return view('editar');
});

Route::get('/deletar', function(){
    return view('deletar');
});

Route::post('/cadastrar-cliente', function (Request $request) {
    Cliente::create([
        'nome' => $request->nome,
        'telefone' => $request->telefone,
        'origem' => $request->origem,
        'data' => $request->data,
        'obs' => $request->obs
    ]);
    echo 'Produto criado com sucesso!';
});

Route::get('/listar-cliente/{id}', function($id){

    $cliente = Cliente::find($id);
    return view('listar', ['cliente' => $cliente]);
});

Route::get('/editar-cliente/{id}', function($id){

    $cliente = Cliente::find($id);
    return view('editar', ['cliente'=> $cliente]);
});

Route::post('/editar-cliente/{id}', function(Request $request, $id){

    $cliente = Cliente::find($id);

    $cliente->update([
        'nome'=> $request->nome,
        'telefone'=> $request->telefone,
        'origem'=> $request->origem,
        'data'=> $request->data,
        'obs'=> $request->obs
    ]);
    
    echo 'Produto editado com sucesso!';
});

Route::get('/deletar-cliente/{id}', function($id){
    
    $cliente = Cliente::find($id);
    $cliente->delete();

    echo 'Produto excluído com sucesso!';

});
