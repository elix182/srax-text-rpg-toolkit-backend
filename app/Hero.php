<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hero extends Model
{
    protected $fillable = [
        'firstName', 'lastName', 'level', 'race', 'class', 'weapon', 'str', 'dex', 'int'
    ];
}
