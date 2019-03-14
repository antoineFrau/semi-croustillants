<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_activities', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')
                ->references('id')->on('users');
            $table->unsignedInteger('activity_id');
            $table->foreign('activity_id')
                ->references('id')->on('activities');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $table->dropForeign('user_activities_user_id_foreign');
        $table->dropColumn('user_id');
        $table->dropForeign('user_activities_activity_id_foreign');
        $table->dropColumn('activity_id');
        Schema::dropIfExists('user_activities');
    }
}
