<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MonsterRace extends Model
{
    protected $fillable = [
        'name', 'description',
    ];

    public function availableAbilities(){
        return $this->belongsToMany(MonsterAbility::class);
    }
}
