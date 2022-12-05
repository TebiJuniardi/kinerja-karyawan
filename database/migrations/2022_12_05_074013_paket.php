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
            $table->string('user_id');
            $table->text('alamat');
            $table->string('nama_user');
            $table->integer('berat');
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
        Schema::dropIfExists('table_pakets');
    }
};
