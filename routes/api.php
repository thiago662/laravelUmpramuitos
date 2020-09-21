<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Models\Categoria;
use App\Models\Produto;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('categorias', function(){
    $cat = Categoria::all();

    if( count($cat) === 0 ){
        echo "<h4>Não há categorias</h4>";
    }else{
        return $cat->toJson();
    }
});

Route::get('produtos', function(){
    $prod = Produto::with(['categoria'])->get();

    if( count($prod) === 0 ){
        echo "<h4>Não há categorias</h4>";
    }else{
        return $prod->toJson();
    }
});

Route::get('categorias/all', function(){
    $cats = Categoria::with('produtos')->get();
    return $cats->toJson();
});

Route::get('produtos/insert', function(){
    $cat = Categoria::find(1);

    $p = new Produto();
    $p->nome = "Air Jordan 1";
    $p->estoque = 100;
    $p->preco = 500;
    $p->categoria()->associate($cat);
    //$p->categoria_id = 1;
    $p->save();
    return $p->toJson();
});

Route::get('produtos/remover', function(){
    $p = Produto::find(7);

    if(isset($p)){
        //tira a dessassocia a categoria
        $p->categoria()->dissociate();
        $p->save();
        return $p->toJson();
    }
});

Route::get('produtos/adicionar/{cat}', function($catid){
    $cat = Categoria::with('produtos')->find($catid);

    $p = new Produto();
    $p->nome = "Xbox Series S";
    $p->estoque = 100;
    $p->preco = 3000;

    if(isset($cat)){
        $cat->produtos()->save($p);
    }

    $cat->load('produtos');

    return $cat->toJson();
});
