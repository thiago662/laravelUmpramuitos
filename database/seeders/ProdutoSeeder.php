<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProdutoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('produtos')->insert([
            'nome' => 'Camisera Confortavel',
            'preco' => 100,
            'estoque' => 4,
            'categoria_id' => 1
        ]);
        DB::table('produtos')->insert([
            'nome' => 'PS5',
            'preco' => 4500,
            'estoque' => 100,
            'categoria_id' => 2
        ]);
        DB::table('produtos')->insert([
            'nome' => 'Dimitri',
            'preco' => 100,
            'estoque' => 50,
            'categoria_id' => 3
        ]);
        DB::table('produtos')->insert([
            'nome' => 'Sofa',
            'preco' => 1500,
            'estoque' => 10,
            'categoria_id' => 4
        ]);
        DB::table('produtos')->insert([
            'nome' => 'Arroz',
            'preco' => 50,
            'estoque' => 1000,
            'categoria_id' => 5
        ]);
        DB::table('produtos')->insert([
            'nome' => 'Roteador',
            'preco' => 50,
            'estoque' => 30,
            'categoria_id' => 6
        ]);
    }
}
