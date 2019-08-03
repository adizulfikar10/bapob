<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBapobHeadersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bapob_headers', function (Blueprint $table) {
            $table->bigIncrements('id_bapob_headers');
            $table->string('nomor_bapob');
            $table->string('nama_produk');
            $table->string('customer');
            $table->string('revisi');
            $table->string('raw_material');
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
        Schema::dropIfExists('bapob_headers');
    }
}
