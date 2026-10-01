<?php

namespace App\Http\Controllers;

use App\Models\Produto;      // importa o Model, pra poder usar Produto::...
use Illuminate\Http\Request; // objeto que representa a requisicao (equivalente ao $_POST/$_GET juntos)

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produtos = Produto::all(); // SELECT * FROM produtos
        return view('produtos.index', ['produtos' => $produtos]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('produtos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $dados = $request->validate([
            'nome' => 'required|string|max:255',
            'categoria' => 'required|string|max:255',
            'tamanho' => 'required|string|max:5',
            'cor' => 'required|string|max:255',
            'preco' => 'required|string|min:0',
            'estoque' => 'required|string|min:0',
        ]);

        Produto::create($dados); // INSERT INTO produtos (nome, categoria, tamanho, cor, preco, estoque) VALUES (...)
        return redirect()->route('produtos.index')->with('sucesso', 'Produto criado!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Produto $produto)
    {
        return view('produtos.show', ['produto' => $produto]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Produto $produto)
    {
        return view('produtos.edit', ['produto' => $produto]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Produto $produto)
    {
        $dados = $request->validate([
            'nome' => 'required|string|max:255',
            'categoria' => 'required|string|max:255',
            'tamanho' => 'required|string|max:5',
            'cor' => 'required|string|max:255',
            'preco' => 'required|string|min:0',
            'estoque' => 'required|string|min:0',
        ]);

        $produto->update($dados); // UPDATE produtos SET ... WHERE id = ?
        return redirect()->route('produtos.index')->with('sucesso', 'Produto atualizado!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Produto $produto)
    {
        $produto->delete();
        return redirect()->route('produtos.index')->with('sucesso', 'Produto excluído!');
    }
}
