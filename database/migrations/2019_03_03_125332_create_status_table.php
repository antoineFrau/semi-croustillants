<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStatusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('status', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->integer('day_start'); // $dayOfWeek 0 (for Sunday) through 6 (for Saturday)
            $table->integer('day_end'); // $dayOfWeek 0 (for Sunday) through 6 (for Saturday)
            $table->integer('hour_start'); // 1900 = 19h00
            $table->integer('hour_end'); // 1000 = 1h00
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
        Schema::dropIfExists('status');
    }
}
