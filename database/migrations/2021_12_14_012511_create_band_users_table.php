<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBandUsersTable extends Migration
{
        /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('band_users', function (Blueprint $table) {
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
            $table->string("startMonth", 10);
            $table->integer("startYear");
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
        Schema::dropIfExists('band_users');
    }
}
