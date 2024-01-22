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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('bu')->nullable();
            $table->string("nama");
            $table->string('npwp')->nullable();
            $table->string('up');
            $table->string('kontak');
            $table->string('email')->nullable();
            $table->string('alamat_kantor');
            $table->string('alamat_kirim');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
