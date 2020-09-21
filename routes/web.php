<?php

use Illuminate\Support\Facades\Route;

use App\Models\Categoria;
use App\Models\Produto;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('categorias/all', function(){
    $cats = Categoria::all();

    foreach ($cats as $c) {
        $produtos = $c->produtos;
        echo "<h1>".$c->nome."</h1><br>";

        foreach($produtos as $p){
            echo "<h2>".$p->nome."</h2><br>";
        }

    }
});
