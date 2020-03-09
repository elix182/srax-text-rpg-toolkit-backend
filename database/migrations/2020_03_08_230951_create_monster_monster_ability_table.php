<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMonsterMonsterAbilityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('monster_monster_ability', function (Blueprint $table) {
            $table->unsignedBigInteger('monster_id');
            $table->unsignedBigInteger('monster_ability_id');
            $table->foreign('monster_id')
              ->references('id')
              ->on('monsters');
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
        Schema::dropIfExists('monster_monster_ability');
    }
}
