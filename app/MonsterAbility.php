<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MonsterAbility extends Model
{
    protected $fillable = [
        'name', 'description', 'damage', 'range',
    ];

    public function knownMonsters(){
        return $this->belongsToMany(Monster::class);
    }
}
