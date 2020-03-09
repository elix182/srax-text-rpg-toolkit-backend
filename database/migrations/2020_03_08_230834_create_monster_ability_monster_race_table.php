<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMonsterAbilityMonsterRaceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('monster_ability_monster_race', function (Blueprint $table) {
            $table->unsignedBigInteger('monster_ability_id');
            $table->unsignedBigInteger('monster_race_id');
            $table->foreign('monster_race_id')
              ->references('id')
              ->on('monster_races');
            $table->foreign('monster_ability_id')
              ->references('id')
              ->on('monster_abilities');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('monster_ability_monster_race');
    }
}
