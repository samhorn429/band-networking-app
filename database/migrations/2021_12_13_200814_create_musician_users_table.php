<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMusicianUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('musician_users_tb', function (Blueprint $table) {
            $table->id();
            $table->string("user_id", 50)->unique();
            $table->string("name", 75);
            $table->string("email", 50)->unique();
            $table->string("city", 50);
            $table->string("state", 10)->nullable();
            $table->string("country", 50);
            $table->longText("description")->nullable();
            $table->longText("imagePath")->nullable();
            $table->longText("lookingFor")->nullable();
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
        Schema::dropIfExists('musician_users_tb');
    }
}
