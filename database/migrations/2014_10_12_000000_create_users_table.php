<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('cpfcnpj')->unique();
            $table->string('data_nascimento');
            $table->string('sexo');
            $table->string('celular');
            $table->string('termos');
            $table->string('ofertas');
            $table->string('tipo');
            $table->string('cep');
            $table->string('endereco');
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
