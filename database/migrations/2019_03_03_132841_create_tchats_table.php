<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTchatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tchats', function (Blueprint $table) {
            $table->unsignedInteger('user_one_id');
            $table->foreign('user_one_id')
            ->references('id')->on('users');
            $table->unsignedInteger('user_two_id');
            $table->foreign('user_two_id')
            ->references('id')->on('users');
            $table->primary(['user_one_id', 'user_two_id']);
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
            $table->dropForeign('posts_user_one_id_foreign');
            $table->dropColumn('user_id');
        });
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign('posts_user_two_id_foreign');
            $table->dropColumn('user_id');
        });
        Schema::dropIfExists('tchats');
    }
}
