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
        Schema::create('indumentarias', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('descripcion');
            $table->double('precio',8,2);
            $table->string('imagen');
            $table->unsignedBigInteger('id_categoria');
            $table->integer('estado')->default(0);
            $table->timestamps();
        });
            
        Schema::table('indumentarias', function (Blueprint $table) {
            $table->foreign('id_categoria')->references('id')->on('categorias');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('indumentarias');
    }
};
