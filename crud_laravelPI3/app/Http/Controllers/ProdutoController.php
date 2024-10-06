<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;
use App\Models\Produto;

class ProdutoController extends Controller
{
    public function cadastrar()
    {
        return view('cadastro_produto');
    }



    public function insere(Request $request)
    {
        $dados = $request->except('_token', 'submit');
        $produto = new Produto;
        $this->validate($request, $produto->rules, $produto->messages);
        if ($request->hasFile('imagem_produto')) {
            $novoNome = $request->file('imagem_produto')->store('images', 'public');
            $dados['imagem_produto'] = $novoNome;
        }
        $insert = Produto::create($dados);
        if ($insert)

            return redirect()->route('lista')->with('success', 'Produto inserido com sucesso!');
        else
            return redirect()->route('cadastrar')->with(['error' => 'Falha ao inserir produto']);
    }

    public function deletar($id)
    {
        $produto = Produto::find($id);
        Storage::disk('public')->delete($produto->getAttributes()['imagem_produto']);
        $deletar = $produto->delete();
        if ($deletar) {
            return redirect()->route('lista')->with('success', 'Deletado com sucesso');
        } else
            return redirect()->route('lista')->with(['error' => 'Erro ao deletar']);
    }

    public function edita($id)
    {
        $produto = Produto::find($id);
        return view('edita', compact('produto'));
    }
    public function atualizar(Request $request, $id)
    {
        
        $dados = $request->except('_token', 'submit');
        $produto = Produto::find($id);
        $this->validate($request, $produto->rules, $produto->messages);
        if ($request->hasFile('imagem_produto')) {
            if ($produto->getAttributes()['imagem_produto'] != NULL)
                Storage::disk('public')->delete($produto->getAttributes()['imagem_produto']);
            $novoNome = $request->file('imagem_produto')->store('images', 'public');
            $dados['imagem_produto'] = $novoNome;
        } else {
            unset($dados['imagem_produto']);
        }
        $edit = $produto->update($dados);
        if ($edit)
            return redirect()->route('lista')->with('success', 'Produto atualizado com sucesso!');
        else
            return redirect()->route('edita', $id)->with(['erros' => 'Falha ao editar']);


    }

    public function lista()
    {
        $produtos = Produto::paginate(3);
        return view('listagem', compact('produtos'));
    }
}