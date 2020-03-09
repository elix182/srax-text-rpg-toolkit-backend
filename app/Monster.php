<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Monster extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'name','level', 'str', 'dex', 'int', 'picture'
    ];

    public function race(){
        return $this->belongsTo(MonsterRace::class, 'monster_race_id');
    }

    public function abilities(){
        return $this->belongsToMany(MonsterAbility::class);
    }
}
