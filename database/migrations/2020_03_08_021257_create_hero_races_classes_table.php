<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHeroRacesClassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hero_races_classes', function (Blueprint $table) {
            $table->unsignedBigInteger('hero_race_id');
            $table->unsignedBigInteger('hero_class_id');
            $table->foreign('hero_race_id')
              ->references('id')
              ->on('hero_races');
            $table->foreign('hero_class_id')
              ->references('id')
              ->on('hero_classes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hero_races_classes');
    }
}
