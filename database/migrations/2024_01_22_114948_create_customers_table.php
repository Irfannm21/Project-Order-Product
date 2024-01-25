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
            $table->string('kpk1');
            $table->string('kpk2')->nullable();
            $table->text('alamat_kantor');
            $table->string('kota');
            $table->string('telepon_kantor')->nullable();
            $table->string('email')->nullable();
            $table->string('pic1');
            $table->string('pic_phone1');
            $table->string('pic_email1')->nullable();
            $table->string('pic2')->nullable();
            $table->string('pic_phone2')->nullable();
            $table->string('pic_email2')->nullable();
            $table->string('pic3')->nullable();
            $table->string('pic_phone3')->nullable();
            $table->string('pic_email3')->nullable();
            $table->text('alamat_kirim1');
            $table->text('alamat_kirim2')->nullable();
            $table->text('alamat_kirim3')->nullable();
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
