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
            $table->decimal('total_transfer');
            $table->integer('kode_unik');
            $table->dateTime('batas_pembayaran');
            $table->string('bukti_transfer');
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
