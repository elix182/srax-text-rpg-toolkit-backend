<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Hero;

class HeroController extends Controller
{
    public function list(){
        $heroes = Hero::all();
        if($heroes->isEmpty()){
            return response()->json([ 'message' => "There aren't any Heroes registered"]);
        }
        return response()->json($heroes);
    }
}
