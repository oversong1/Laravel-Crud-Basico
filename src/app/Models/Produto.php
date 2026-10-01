<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    // $fillable: lista de colunas que PODEM ser preenchidas em massa
    // (ex.: Produto::create($_POST)) - proteção contra alguém mandar um campo
    // que não devia (ex.: mudar o "id" de propósito, num formulário malicioso).
    protected $fillable = [
        'nome',
        'categoria',
        'tamanho',
        'cor',
        'preco',
        'estoque',
    ];
}

