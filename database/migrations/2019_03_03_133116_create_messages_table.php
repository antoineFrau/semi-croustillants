<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->increments('id');
            $table->text('contents');
            $table->datetime('date');
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')
            ->references('id')->on('users');
            $table->unsignedInteger('user_one_id');
            $table->unsignedInteger('user_two_id');
            $table->foreign(['user_one_id','user_two_id'])
            ->references(['user_one_id','user_two_id'])
            ->on('tchats');
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
        Schema::table('messages', function (Blueprint $table) {
            $table->dropForeign('messages_user_id_foreign');
            $table->dropColumn('user_id');
            $table->dropForeign('messages_user_one_id_user_two_id_foreign');
            $table->dropColumn('user_one_id');
            $table->dropColumn('user_two_id');
        });
        Schema::dropIfExists('messages');
    }
}
