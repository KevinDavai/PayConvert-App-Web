<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCardTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cards', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->string('value');
            $table->string('status');
            $table->unsignedBigInteger('user_id')->default(1);
            $table->timestamps();
        });

        Schema::table('cards', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cards');

        Schema::table('cards', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
        });
    }
}
