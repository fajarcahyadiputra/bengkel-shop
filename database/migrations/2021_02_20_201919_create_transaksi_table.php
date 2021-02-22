<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi', function (Blueprint $table) {
            $table->id();
            $table->foreignId('users_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('alamat_user_id')->constrained('alamat_user');
            $table->foreignId('rekening_id')->constrained('rekening')->onDelete('cascade');
            $table->string('invoice', 100);
            $table->enum('status', ['proses', 'pending', 'sukses'])->default('pending');
            $table->string('atas_nama');
            $table->string('nomer_rekening');
            $table->decimal('total_tranfer');
            $table->integer('kode_unik');
            $table->string('nama_bank');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaksi');
    }
}
