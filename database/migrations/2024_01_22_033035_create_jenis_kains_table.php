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
        Schema::create('jenis_kains', function (Blueprint $table) {
            $table->id();
            $table->string("tipe");
            $table->string("item")->unique();
            $table->string("total_end")->nullable();;
            $table->string("no_sisir")->nullable();;
            $table->string("komposisi")->nullable();;
            $table->string("benang");
            $table->string("anyaman");
            $table->string("kontruksi_grei")->nullable();;
            $table->string("berat_square_grei")->nullable();;
            $table->string("kontruksi_finished")->nullable();;
            $table->string("berat_linier_finished")->nullable();;
            $table->string("berat_square_finished")->nullable();;
            $table->string('update')->nullable();;
            $table->string('keterangan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jenis_kains');
    }
};
