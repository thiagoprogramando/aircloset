<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(): void {
        Schema::create('produto', function (Blueprint $table) {
            $table->id();
            $table->string('titulo')->nullable();
            $table->longText('desc')->nullable();
            $table->integer('loja')->nullable();
            $table->decimal('valor', 10, 2)->nullable();
            $table->integer('status')->nullable();
            $table->string('sexo')->nullable();
            $table->string('comprimento')->nullable();
            $table->string('tamanho')->nullable();
            $table->string('tecido')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('produto');
    }
};
