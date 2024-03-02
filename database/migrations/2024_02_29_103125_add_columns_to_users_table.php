<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string("description")->nullable();
            $table->string("instagram")->default("instagram");
            $table->string("telegram")->default("telegram");
            $table->string("avatar")->default("users_avatar/default/default.png");
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
            $table->dropColumn("description");
            $table->dropColumn("instagram");
            $table->dropColumn("telegram");
            $table->dropColumn("avatar");
        });
    }
}
