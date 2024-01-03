<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    
    public function up(): void {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('cpfcnpj')->unique();
            $table->date('data_nascimento')->nullable();
            $table->string('sexo')->nullable();
            $table->string('celular')->nullable();
            $table->string('termos');
            $table->string('ofertas')->nullable();
            $table->string('tipo');
            $table->string('cep')->nullable();
            $table->string('endereco')->nullable();
            $table->integer('id_loja')->nullable();
            $table->string('codigo')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('users');
    }
};
