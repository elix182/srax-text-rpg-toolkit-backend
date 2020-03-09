<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Weapon;
use App\HeroClass;

class WeaponController extends Controller
{
    public function list(){
        $weapons = Weapon::all();
        return response()->json($weapons);
    }

    public function findByClass(Int $classId){
        $weapons = HeroClass::find($classId)->availableWeapons()->get();
        return response()->json($weapons);
    }
}
