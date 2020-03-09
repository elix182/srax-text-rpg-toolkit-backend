<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\HeroRace;
use App\HeroClass;

class HeroClassController extends Controller
{
    public function list(){
        $classes = HeroClass::all();
        return response()->json($classes);
    }

    public function findByRace(Int $raceId){
        $classes = HeroRace::find($raceId)->availableClasses()->get();
        return response()->json($classes);
    }
}
