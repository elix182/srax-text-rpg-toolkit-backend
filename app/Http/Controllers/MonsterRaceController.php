<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MonsterRace;

class MonsterRaceController extends Controller
{
    public function list(){
        $races = MonsterRace::all();
        return response()->json($races);
    }
}
