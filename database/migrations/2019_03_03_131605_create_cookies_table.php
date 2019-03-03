<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCookiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cookies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('value');
            $table->string('domain');
            $table->string('path');
            $table->datetime('expiry');
            $table->integer('size');
            $table->string('http');
            $table->boolean('secured');
            $table->unsignedInteger('history_id');
            $table->foreign('history_id')
            ->references('id')->on('histories');
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
        Schema::table('cookies', function (Blueprint $table) {
            $table->dropForeign('cookies_history_id_foreign');
            $table->dropColumn('history_id');
        });
        Schema::dropIfExists('cookies');
    }
}
