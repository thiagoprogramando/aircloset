<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    
    public function up(): void {
        Schema::create('categoria_produto', function (Blueprint $table) {
            $table->id();
            $table->integer('id_produto');
            $table->integer('id_categoria');
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('categoria_produto');
    }
};
