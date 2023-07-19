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
        Schema::create('stocks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_indumentaria');
            $table->unsignedBigInteger('id_talle');
            $table->integer('cantidad');
            $table->timestamps();
        });
            
        Schema::table('stocks', function (Blueprint $table) {
            $table->foreign('id_indumentaria')->references('id')->on('indumentarias');
            $table->foreign('id_talle')->references('id')->on('talles');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stocks');
    }
};
