<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProdutosTableSeeder extends Seeder
{
    
    public function run(): void
    {
        DB::table('produtos')->insert([
            'nome_produto' => 'Xiaomi',
            'descricao_produto' => 'Exemplo de Celular Xiaomi',
            'preco_produto' => 400,
            'imagem_produto' => 'images/xiaomi.jfif',
            
            ]);
            DB::table('produtos')->insert([
            'nome_produto' => 'Sofá',
            'descricao_produto' => 'Exemplo de Sofá',
            'preco_produto' => 400,
            'imagem_produto' => 'images/sofa.jfif',
            ]);
            DB::table('produtos')->insert([
            'nome_produto' => 'Monitor',
            'descricao_produto' => 'Exemplo de Monitor',
            'preco_produto' => 400,
            'imagem_produto' => 'images/monitor.jfif',
            ]); 
    }
}
