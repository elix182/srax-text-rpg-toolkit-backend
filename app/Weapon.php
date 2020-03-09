<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Weapon extends Model
{
    protected $fillable = [
        'name', 'description', 'damage', 'range', 'twoHanded'
    ];

    public function knownHeroes(){
        return $this->hasMany(Hero::class);
    }
}
