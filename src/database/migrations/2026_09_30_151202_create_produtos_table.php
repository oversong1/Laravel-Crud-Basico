<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // up(): o que acontece quando a migration RODA (cria a tabela)
        Schema::create('produtos', function (Blueprint $table) {
            $table->id();                          // cria "id BIGINT PRIMARY KEY AUTO_INCREMENT"
            $table->string('nome');                 // VARCHAR(255) por padrao
            $table->string('categoria');
            $table->string('tamanho', 5);            // VARCHAR(5) - segundo parametro = tamanho maximo
            $table->string('cor');
            $table->decimal('preco', 10, 2);         // NUMERIC(10,2) - mesma logica do PHP puro
            $table->unsignedInteger('estoque')->default(0); // inteiro sem sinal, comeca em 0
            $table->timestamps();                    // cria "created_at" e "updated_at" automaticos
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // down(): o que acontece quando a migration e DESFEITA (apaga a tabela)
        Schema::dropIfExists('produtos');
    }
};
