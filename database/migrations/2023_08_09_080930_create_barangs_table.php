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
        Schema::create('barang', function (Blueprint $table) {
            #$table->id();
            #$table->timstamps();
            $table->integer('id_barang',true);
            $table->bigInteger('barcode')->nullable(false);
            $table->string('nama_barang',100)->nullable(false);
            $table->text('foto_barang')->nullable(true);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barang');
    }
};
