<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMonsterRaceToMonstersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('monsters', function (Blueprint $table) {
            $table->unsignedBigInteger('monster_race_id');
            $table->foreign('monster_race_id')
                ->references('id')
                ->on('monster_races');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('monsters', function (Blueprint $table) {
            $table->dropColumn('monster_race_id');
            $table->dropForeign('monsters_monster_race_id_foreign');
        });
    }
}
