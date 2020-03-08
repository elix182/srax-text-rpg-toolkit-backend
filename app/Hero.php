<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hero extends Model
{
    protected $fillable = [
        'firstName', 'lastName', 'level', 'str', 'dex', 'int'
    ];

    //'race', 'class', 'weapon',

    public function race(){
        return $this->hasOne(HeroRace::class, 'hero_race_id');
    }

}
