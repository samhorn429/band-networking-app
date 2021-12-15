<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConnectionUserTwoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('connection_user_two', function (Blueprint $table) {
            $table->id();
            $table->string("userIdTwo")->unique();
            // $table->foreign("userIdTwo")
            //     ->references("userId")->on("musician_users_tb")
            //     ->onDelete("cascade");
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
        Schema::dropIfExists('connection_user_two');
    }
}
