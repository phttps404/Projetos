@extends('layouts.app')
@section('content')
<div class="container">
    <h1 class="text-center">Edição de um
    Produto</h1>
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
    @if(isset($errors) && count($errors) > 0)
        <div class="alert alert-danger">
            @foreach($errors->all() as $error)
                <p> {{$error}} </p>
            @endforeach
        </div>
    @endif
    

    <form method="POST" action="{{route('atualizar',$produto->id)}}" enctype="multipart/form-data">
        @csrf
        <div class="form-group"> <label for="pwd">Produto:</label>
            <input type="text" class="form-control" name="nome_produto" value="{{$produto->nome_produto}}">
        </div>
       
        
        <div class="form-group"> <label for="pwd">Descrição:</label>
            <input type="textarea" class="form-control" name="descricao_produto" value="{{$produto->descricao_produto}}">
        </div>
        <div class="form-group"> <label for="pwd">Preço:</label>
            <input type="number" class="form-control" name="preco_produto" value="{{$produto->preco_produto}}">
        </div>
        <img src="{{asset('storage/'.$produto['imagem_produto'])}}" alt="{{$produto->imagem_produto}}" style='height = 42'width=50>
        <div class="form-group"> <label for="pwd">Imagem do Produto</label>
            <input type="file" class="form-control" name="imagem_produto" valeu="{{$produto->imagem_produto}}">
        </div>
        <input class='btn btn-secondary' type="reset" value="Limpar">
        <input class='btn btn-primary' type="submit" name="submit" value="Enviar">
    </form>
</div>
@endsection