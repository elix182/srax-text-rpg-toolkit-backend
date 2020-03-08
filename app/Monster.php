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
        return null;
    }

    public function abilities(){
        return null;
    }
}
