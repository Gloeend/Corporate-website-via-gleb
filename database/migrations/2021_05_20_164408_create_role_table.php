<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateRoleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('role', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name');
        });

        $current_date_time = \Carbon\Carbon::now()->toDateTimeString();
        DB::table('role')->insert(
            array(
                'name' => 'user',
                'created_at' => $current_date_time,
                'updated_at' => $current_date_time,
            )
        );
        DB::table('role')->insert(
            array(
                'name' => 'manager',
                'created_at' => $current_date_time,
                'updated_at' => $current_date_time,
            )
        );
        DB::table('role')->insert(
            array(
                'name' => 'admin',
                'created_at' => $current_date_time,
                'updated_at' => $current_date_time,
            )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('role');
    }
}
