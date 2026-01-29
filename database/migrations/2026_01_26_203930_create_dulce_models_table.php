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
        Schema::create('dulce_models', function (Blueprint $table) {
            $table->id();
            $table->integer('juguete_id');
            $table->string('nombre_dulce');
            $table->string('color_dulce');
            $table->string('marca_dulce');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dulce_models');
    }
};
