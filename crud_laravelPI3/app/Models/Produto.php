<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $fillable = [
        'nome_produto',
        'descricao_produto',
        'preco_produto',
        'imagem_produto'
    ];
    
    public $rules = [
        'nome_produto' => 'required|min:2|max:100',
        'descricao_produto' => 'required|min:5|max:100',
        'preco_produto' => 'required',
        'imagem_produto' => 'image'
    ];
    public $messages = [
        'nome_produto.required' => 'O campo nome é obrigatório',
        'nome_produto.min' => 'O campo nome deve ter no mínimo 2 caracteres',
        'descricao_produto.required' => 'O campo descrição é obrigatório',
        'descricao_produto.min' => 'O campo descrição deve ter no mínimo 5 caracteres',
        'preco_produto.required' => 'O campo preço é obrigatório',
        'imagem_produto.image' => 'A foto deve ser nos seguintes formatos (jpg, jpeg, png, bmp, gif, svg ou webp).'
    ];

    use HasFactory;
}
