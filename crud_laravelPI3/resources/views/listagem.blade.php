@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<div class="container">
    <h1 class="text-center">Listagem de Produtos</h1>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    <a href="{{route('cadastrar')}}">
        <span class="material-icons">add</span>
        Adicionar um novo produto
    </a>
</div>
<div class="container">
    <br>
    <h2>Listagem dos produtos cadastrados</h2>
    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Descrição</th>
                <th>Preco</th>
                <th>Imagem</th>
                <th>Editar</th>
                <th>Apagar</th>
            </tr>
        </thead>
        <tbody>
            @foreach($produtos as $produto)
                <tr>
                    <td> {{$produto['nome_produto']}} </td>
                    <td> {{$produto['descricao_produto']}} </td>
                    <td>{{$produto['preco_produto']}}</td>
                    <td>
                        <img src="{{asset('storage/' . $produto['imagem_produto'])}}" alt="{{$produto->imagem_produto}}"
                            style='height = 42' width=50>

                    </td>

                    <td><a href="{{route('edita', $produto->id)}}"><span class='material-icons'> edit
                            </span>
                        </a>
                    </td>
                    <td><a href="{{route('deletar', $produto->id)}}"><span class='material-icons'> delete
</span>
</a>


                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {!! $produtos->links() !!}
</div>
@endsection