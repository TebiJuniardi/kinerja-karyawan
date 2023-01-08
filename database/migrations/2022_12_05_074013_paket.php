<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('table_pakets', function (Blueprint $table) {
            $table->id()->unique();
            $table->string('no_resi');
            $table->string('nama_pengirim');
            $table->string('alamat_pengirim');
            $table->string('no_tlpn_pengirim');
            $table->string('nama_penerima');
            $table->text('alamat');
            $table->string('no_tlpn_user');
            $table->integer('berat');
            $table->timestamps();
            $table->tinyInteger('status')->default('1');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('table_pakets');
    }
};
