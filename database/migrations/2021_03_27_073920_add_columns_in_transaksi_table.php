<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsInTransaksiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('transaksi', function (Blueprint $table) {
            $table->text('catatan')->after('bukti_transfer');
            $table->string('kurir', 50)->after('kode_unik');
            $table->string('jenis_pengiriman', 50)->after('kurir');
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
            $table->removeColumn('catatan');
            $table->removeColumn('kurir');
            $table->removeColumn('jenis_pengiriman');
        });
    }
}
