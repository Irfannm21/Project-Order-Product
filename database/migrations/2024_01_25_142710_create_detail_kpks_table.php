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
        Schema::create('detail_kpks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("kpk_id");
            $table->unsignedBigInteger("jenis_id");
            $table->bigInteger('harga');
            $table->string('ppn');
            $table->string('warna');
            $table->string('quantity');
            $table->string('satuan');
            $table->foreign('kpk_id')->references('id')->on("kpks");
            $table->foreign('jenis_id')->references('id')->on("jenis_kains");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_kpks');
    }
};
