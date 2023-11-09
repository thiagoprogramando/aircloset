<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(): void {
        Schema::create('tag', function (Blueprint $table) {
            $table->id();
            $table->string('tag')->unique();
            $table->string('cor')->unique();
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('tag');
    }
};
