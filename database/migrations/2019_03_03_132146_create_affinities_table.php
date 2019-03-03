<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAffinitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('affinities', function (Blueprint $table) {
            $table->unsignedInteger('user_one_id');
            $table->foreign('user_one_id')
            ->references('id')->on('users');
            $table->unsignedInteger('user_two_id');
            $table->foreign('user_two_id')
            ->references('id')->on('users');
            $table->integer('degree');
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
        Schema::table('affinities', function (Blueprint $table) {
            $table->dropForeign('affinities_user_one_id_foreign');
            $table->dropColumn('user_one_id');
            $table->dropForeign('affinities_user_two_id_foreign');
            $table->dropColumn('user_two_id');
        });
        Schema::dropIfExists('affinities');
    }
}
