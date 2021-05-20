<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fio', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('id_fn');
            $table->unsignedBigInteger('id_ln');
            $table->unsignedBigInteger('id_mn');
            $table->foreign('id_fn')->references('id')->on('fn')->onDelete('cascade');
            $table->foreign('id_ln')->references('id')->on('ln')->onDelete('cascade');
            $table->foreign('id_mn')->references('id')->on('mn')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fio');
    }
}
