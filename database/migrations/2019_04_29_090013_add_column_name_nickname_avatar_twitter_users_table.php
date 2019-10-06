<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnNameNicknameAvatarTwitterUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('twitter_users', function (Blueprint $table) {
            //
            $table->string('name');
            $table->string('nickname');
            $table->string('avatar_path');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('twitter_users', function (Blueprint $table) {
            //
        });
    }
}
