<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHasbeenamemberofTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hasbeenamember_of', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("musician_id");
            $table->unsignedBigInteger("band_id");
            $table->string("memberType", 25);
            $table->string("bandType", 25);
            $table->string("startMonth", 10);
            $table->integer("startYear");
            $table->string("endMonth", 10)->nullable();
            $table->integer("endYear")->nullable();
            $table->longText("memberDesc")->nullable();
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
        Schema::dropIfExists('hasbeenamember_of');
    }
}
