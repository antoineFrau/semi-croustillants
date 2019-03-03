<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activities', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')
            ->references('id')->on('users');
            $table->unsignedInteger('category_id');
            $table->foreign('category_id')
            ->references('id')->on('activities_categories');
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
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign('posts_user_id_foreign');
            $table->dropColumn('user_id');
        });
        Schema::table('activities_categories', function (Blueprint $table) {
            $table->dropForeign('activities_category_id_foreign');
            $table->dropColumn('category_id');
        });
        Schema::dropIfExists('activities');
    }
}
