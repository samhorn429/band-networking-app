<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNoAccountBandsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('no_AccountBands', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("mem_id");
            $table->string("name", 75);
            $table->longText("imagePath")->nullable();
            $table->string("city", 50);
            $table->string("state", 10)->nullable();
            $table->string("country", 50);
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
        Schema::dropIfExists('no_AccountBands');
    }
}
