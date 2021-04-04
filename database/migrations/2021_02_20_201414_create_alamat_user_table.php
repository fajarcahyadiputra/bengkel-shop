<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlamatUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alamat_user', function (Blueprint $table) {
            $table->id();
            $table->foreignId('users_id')->constrained('users')->onDelete('cascade');
            $table->string('nama_penerima')->nullable();
            $table->string('kecamatan', 50);
            $table->string('kabupaten', 50);
            $table->integer('kab_id');
            $table->string('provinsi', 50);
            $table->integer('prov_id');
            $table->integer('kode_pos');
            $table->string('nomer_hp', 20);
            $table->text('patokan')->nullable();
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
        Schema::dropIfExists('alamat_user');
    }
}
