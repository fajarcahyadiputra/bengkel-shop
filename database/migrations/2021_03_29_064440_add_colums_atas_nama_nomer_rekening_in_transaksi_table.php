<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumsAtasNamaNomerRekeningInTransaksiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('transaksi', function (Blueprint $table) {
            $table->bigInteger('tagihan')->after('total_transfer');
            $table->string('atas_nama', 100)->after('jenis_pengiriman');
            $table->string('nomer_rekening', 100)->after('atas_nama');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('transaksi', function (Blueprint $table) {
            $table->dropColumn('atas_nama');
            $table->dropColumn('nomer_rekening');
        });
    }
}
