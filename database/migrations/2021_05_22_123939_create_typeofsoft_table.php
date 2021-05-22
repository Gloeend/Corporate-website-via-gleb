<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTypeofsoftTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('typeofsoft', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->char('name');
            $table->integer('price');

            $table->unsignedBigInteger('id_software');
            $table->foreign('id_software')->references('id')->on('software')->onDelete('cascade');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('typeofsoft');
    }
}
