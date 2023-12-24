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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('bahan_id');
            $table->unsignedBigInteger('warna_id');
            $table->unsignedBigInteger('ukuran_id');

            $table->foreign('bahan_id')->references('id')->on('bahans')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('warna_id')->references('id')->on('warnas')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('ukuran_id')->references('id')->on('ukurans')->onUpdate('cascade')->onDelete('cascade');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
