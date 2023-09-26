<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nome')->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('password')->nullable();
            $table->string('cpfcnpj')->unique()->nullable();
            $table->string('data_nascimento')->nullable();
            $table->string('sexo')->nullable();
            $table->string('celular')->nullable();
            $table->string('termos')->nullable();
            $table->string('ofertas')->nullable();
            $table->string('tipo')->nullable();
            $table->string('cep')->nullable();
            $table->string('endereco')->nullable();
            $table->integer('loja')->nullable();
            $table->string('codigo')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('users');
    }
};
