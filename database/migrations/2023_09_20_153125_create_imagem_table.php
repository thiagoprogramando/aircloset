<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void {
        Schema::create('imagem', function (Blueprint $table) {
            $table->id();
            $table->integer('id_produto');
            $table->string('file');
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('imagem');
    }
};
