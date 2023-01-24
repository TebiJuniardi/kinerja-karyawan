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
        Schema::create('table_jadwals', function (Blueprint $table) {
            $table->id();
            $table->string('jadwal_pengiriman');
            $table->string('no_resi');
            $table->string('id_driver');
            $table->text('id_paket')->nullable();
            $table->text('id_customer')->nullable();
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
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
        Schema::dropIfExists('table_jadwals');
    }
};
