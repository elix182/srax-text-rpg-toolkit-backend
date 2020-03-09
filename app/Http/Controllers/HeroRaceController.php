<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\HeroRace;

class HeroRaceController extends Controller
{
    public function list(){
        $races = HeroRace::all();
        return response()->json($races);
    }
}
