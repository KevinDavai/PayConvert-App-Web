<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAllIntegrationCollumns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function ($table) {
            $table->string('steam_id')->nullable();
            $table->string('steam_name')->nullable();

            $table->string('github_id')->nullable();
            $table->string('github_name')->nullable();

            $table->string('discord_id')->nullable();
            $table->string('discord_name')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
