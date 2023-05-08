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
        Schema::create('stock', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_remera');
            $table->unsignedBigInteger('id_talle');
            $table->integer('cantidad');
            $table->timestamps();
        });

        Schema::table('stock', function (Blueprint $table) {
            $table->foreign('id_remera')->references('id')->on('remera');
            $table->foreign('id_talle')->references('id')->on('talle');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stock');
    }
};
