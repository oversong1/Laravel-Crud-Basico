@extends('layouts.app')

@section('conteudo')
    <h1>Novo produto</h1>

    {{-- Se a validacao falhou (Fase 4), $errors vem preenchido automaticamente --}}
    @if ($errors->any())
        <ul style="color: red;">
            @foreach ($errors->all() as $erro)
                <li>{{ $erro }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('produtos.store') }}" method="POST">
        @csrf

        <label>Nome:</label>
        {{-- old('nome'): se o formulario foi reenviado por erro de validacao, mantem
             o que a pessoa ja tinha digitado, em vez de limpar o campo --}}
        <input type="text" name="nome" value="{{ old('nome')}}">
        
        <label>Categoria:</label>
        <input type="text" name="categoria" value="{{ old('categoria')}}">
        
        <label>Tamanho:</label>
        <input type="text" name="tamanho" value="{{ old('tamanho')}}">
        
        <label>Cor:</label>
        <input type="text" name="cor" value="{{ old('cor')}}">
        
        <label>Preço:</label>
        <input type="text" name="preco" value="{{ old('preco')}}">
        
        <label>Estoque:</label>
        <input type="text" name="estoque" value="{{ old('estoque')}}">

        <button type="submit">Criar</button>
    </form>
@endsection