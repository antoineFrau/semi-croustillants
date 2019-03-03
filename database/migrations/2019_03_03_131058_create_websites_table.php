<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWebsitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('websites', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('url');
            $table->unsignedInteger('historic_id');
            $table->foreign('historic_id')
            ->references('id')->on('historic');
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
        Schema::table('historic', function (Blueprint $table) {
            $table->dropForeign('websites_historic_id_foreign');
            $table->dropColumn('historic_id');
        });
        Schema::dropIfExists('websites');
    }
}
