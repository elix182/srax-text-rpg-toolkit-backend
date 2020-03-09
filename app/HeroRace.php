<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HeroRace extends Model
{
    protected $fillable = [
        'name', 'description', 'strBonus', 'dexBonus', 'intBonus'//, 'skills'
    ];

    // available classes
    public function availableClasses(){
        return $this->belongsToMany(HeroClass::class);
    }

    public function knownHeroes(){
        return $this->hasMany(Hero::class);
    }
}
