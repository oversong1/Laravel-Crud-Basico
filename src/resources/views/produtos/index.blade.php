@extends('layouts.app')

@section('conteudo')
    <h1>Produtos</h1>

    <a href="{{ route('produtos.create') }}">Novo produto</a>

    <table>
        <thead>
            <tr>
                <th>Nome</th>
                <th>Categoria</th>
                <th>Tamanho</th>
                <th>Cor</th>
                <th>Preço</th>
                <th>Estoque</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            {{-- @foreach: igual o foreach do PHP, so que dentro do template --}}
            @foreach ($produtos as $produto)
                <tr>
                    <td>{{ $produto->nome }}</td>
                    <td>{{ $produto->categoria }}</td>
                    <td>{{ $produto->tamanho }}</td>
                    <td>{{ $produto->cor }}</td>
                    {{-- number_format: mesma funcao PHP de sempre, funciona normal dentro do Blade --}}
                    <td>R$ {{ number_format($produto->preco, 2, ',', '.') }}</td>
                    <td>{{ $produto->estoque }}</td>
                    <td>
                        <a href="{{ route('produtos.edit', $produto) }}">Editar</a>

                        {{-- Formularios HTML so tem GET e POST de verdade - @method('DELETE')
                             "finge" ser um DELETE, e o Laravel entende essa finta --}}
                        <form action="{{ route('produtos,destroy', $produto)}}" method= "POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection