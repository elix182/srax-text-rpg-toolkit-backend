<?php

namespace App\Http\Controllers;

use App\MonsterAbility;
use App\MonsterRace;
use Illuminate\Http\Request;

class MonsterAbilityController extends Controller
{
    public function list(){
        $abilities = MonsterAbility::all();
        return response()->json($abilities);
    }

    public function findByRace(Int $raceId){
        $abilities = MonsterRace::find($raceId)->availableAbilities()->get();
        return response()->json($abilities);
    }
}
