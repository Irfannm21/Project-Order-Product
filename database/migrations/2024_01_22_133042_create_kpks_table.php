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
        Schema::create('kpks', function (Blueprint $table) {
            $table->id();
            $table->date("tanggal");
            $table->string("po");
            $table->unsignedBigInteger("customer_id");
            $table->string("jenis");
            $table->bigInteger("harga");
            $table->string('harga_perukuran');
            $table->string("ppn");
            $table->string("proses")->nullable();
            $table->string("quantity");
            $table->string("ukuran_satuan");
            $table->string("warna")->nullable();
            $table->string("remarks")->nullable();


            $table->foreign('customer_id')->references('id')->on("Customers");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kpks');
    }
};
