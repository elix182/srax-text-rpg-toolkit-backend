<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hero extends Model
{
    protected $fillable = [
        'firstName', 'lastName', 'level', 'str', 'dex', 'int', 'exp', 'active'
    ];

    //'race', 'class', 'weapon',

    public function race(){
        return $this->hasOne(HeroRace::class, 'hero_race_id');
    }

    public function heroClass(){
        return $this->hasOne(HeroClass::class, 'hero_class_id');
    }

    public function weapon(){
        return $this->hasOne(Weapon::class, 'weapon_id');
    }
}
