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
            $table->string("no_kpk")->unique();
            $table->date("tanggal");
            $table->unsignedBigInteger("customer_id");
            $table->string("attn")->nullable();
            $table->string("po");
            $table->string("perihal")->nullable();
            $table->string("proses_makloon")->nullable();
            $table->string("keterangan")->nullable();
            $table->string("top")->nullable();
            $table->string('delivery');
            $table->string("packing");
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
