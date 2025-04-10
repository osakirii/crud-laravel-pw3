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

Route::post('/cadastrar-cliente', function (Request $request) {
    Cliente::create([
        'nome' => $request->nome,
        'telefone' => $request->telefone,
        'origem' => $request->origem,
        'data' => $request->data,
        'obs' => $request->obs
    ]);
    echo 'Produto criado com sucesso! <br><button><a href="/">Voltar<a></button>';
});

Route::get('/listar-cliente', function(){

    $clientes = Cliente::all();
    return view('listar', ['clientes' => $clientes]);
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
    
    echo 'Produto editado com sucesso! <br><button><a href="/listar-cliente">Voltar<a></button>';
});

Route::get('/deletar-cliente/{id}', function($id){
    
    $cliente = Cliente::find($id);
    $cliente->delete();

    echo 'Produto excluído com sucesso! <br><button><a href="/listar-cliente">Voltar<a></button>';

});
