@extends('layouts.app')

@section('conteudo')
    <h1>Editar produto</h1>

    @if ($errors->any())
        <ul style="color: red;">
            @foreach ($errors->all() as $erro)
                <li>{{ $erro }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('produtos.update', $produto) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Nome:</label>
        <input type="text" name="nome" value="{{ old('nome', $produto->nome) }}">

        <label>Categoria:</label>
        <input type="text" name="categoria" value="{{ old('categoria', $produto->categoria) }}">

        <label>Tamanho:</label>
        <input type="text" name="tamanho" value="{{ old('tamanho', $produto->tamanho) }}">

        <label>Cor:</label>
        <input type="text" name="cor" value="{{ old('cor', $produto->cor) }}">

        <label>Preço:</label>
        <input type="text" name="preco" value="{{ old('preco', $produto->preco) }}">

        <label>Estoque:</label>
        <input type="number" name="estoque" value="{{ old('estoque', $produto->estoque) }}">

        <button type="submit">Salvar</button>
    </form>
@endsection