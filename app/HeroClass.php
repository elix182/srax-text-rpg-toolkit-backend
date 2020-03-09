<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HeroClass extends Model
{
    protected $fillable = [
        'name', 'description' //, 'skills'
    ];

    public function availableWeapons(){
        return $this->belongsToMany(Weapon::class);
    }

    public function knownHeroes(){
        return $this->hasMany(Hero::class);
    }
}
