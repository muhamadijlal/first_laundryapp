<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create('data', function (Blueprint $table) {
            $table->id('id');
            $table->string('no_transaksi');
            $table->string('nama');
            $table->string('nohp')->nullable();
            $table->float('qty');
            $table->string('tanggal');
            $table->string('jenis');
            $table->string('total');
            $table->string('status');
            $table->string('status_pembayaran');
            $table->softDeletes();
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
        Schema::dropIfExists('data');
    }
}