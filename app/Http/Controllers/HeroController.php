<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Hero;
use App\HeroRace;
use App\HeroClass;
use App\Weapon;

class HeroController extends Controller
{
    public function list(){
        $heroes = Hero::all();
        if($heroes->isEmpty()){
            return response()->json([ 'message' => "There aren't any Heroes registered"]);
        }
        return response()->json($heroes);
    }

    public function create(Request $request){
        //Validate the request
        $validator = Validator::make($request->all(),
        [
            'firstName' => 'required|string',
            'raceId' => 'required|integer',
            'classId' => 'required|integer',
            'weaponId' => 'required|integer',
            'str' => 'required|integer',
            'dex' => 'required|integer',
            'int' => 'required|integer',
        ]);
        if($validator->fails()){
            return response()->json(["message" => "The hero request lacks data"], 400);
        }
        //Check if the selected data exists
        $race = HeroRace::find($request->raceId);
        if($race == null){
            return response()->json(["message" => "Hero Race not found"], 404);
        }
        $class = HeroClass::find($request->classId);
        if($class == null){
            return response()->json(["message" => "Hero Class not found"], 404);
        }
        $weapon = Weapon::find($request->weaponId);
        if($weapon == null){
            return response()->json(["message" => "Weapon not found"], 404);
        }
        //Now let's see if the data is compatible
        if($race->availableClasses()->find($class->id) == null){
            return response()->json(["message" => "A $race->name can't be a $class->name"], 400);
        }
        if($class->availableWeapons()->find($weapon->id) == null){
            return response()->json(["message" => "A $class->name can't use a $weapon->name"], 400);
        }
        //Finally check if the data is valid
        if($request->str <= 0 || $request->str > 100){
            return response()->json(["message" => "STR cannot be lower or equal than 0 or greater than 100"], 400);
        }
        if($request->dex <= 0 || $request->dex > 100){
            return response()->json(["message" => "DEX cannot be lower or equal than 0 or greater than 100"], 400);
        }
        if($request->int <= 0 || $request->int > 100){
            return response()->json(["message" => "INT cannot be lower or equal than 0 or greater than 100"], 400);
        }
        //Actual creation of the hero with initial state
        $hero = new Hero();
        $hero->firstName = $request->firstName;
        $hero->lastName = $request->lastName;
        $hero->str = $request->str;
        $hero->dex = $request->dex;
        $hero->int = $request->int;
        $hero->hero_race_id = $race->id;
        $hero->hero_class_id = $class->id;
        $hero->weapon_id = $weapon->id;
        $hero->level = 1;
        $hero->exp = 0;
        $hero->active = true;
        $hero->save();

        $name = trim("$hero->firstName $hero->lastName");
        return response()->json(["message" => "Hero $name created successfully"]);
    }

    public function random(){
        $firstNames = explode(', ','Bheizer, Khazun, Grirgel, Murgil, Edraf, En, Grognur, Grum, Surhathion, Lamos, Melmedjad, Shouthes, Che, Jun, Rircurtun, Zelen');
        $lastNames = explode(', ','Nema, Dhusher, Burningsun, Hawkglow, Nav, Kadev, Lightkeeper, Heartdancer,Fivrithrit, Suechit, Tuldethatvo, Vrovakya, Hiao, Chiay, Hogoscu, Vedrimor');
        $race = HeroRace::all()->random();
        $class = $race->availableClasses()->inRandomOrder()->first();
        $weapon = $class->availableWeapons()->inRandomOrder()->first();
        $firstNameIndex = rand(0, count($firstNames)-1);
        $firstName = $firstNames[$firstNameIndex];
        $lastName = '';
        switch($race->name){
            case 'Half-Orc':
            case 'Dragonborn':
                $lastName = '';
                break;
            case 'Elf':
                $lastName = ucfirst(strtolower(strrev($firstName)));
            break;
            case 'Dwarf':
                while(strpos(strtoupper($firstName), 'R') === false && strpos(strtoupper($firstName), 'H') === false){
                    $firstNameIndex = rand(0, count($firstNames)-1);
                    $firstName = $firstNames[$firstNameIndex];
                }
                while(strpos(strtoupper($lastName), 'R') === false && strpos(strtoupper($lastName), 'H') === false){
                    $lastNameIndex = rand(0, count($lastNames)-1);
                    $lastName = $lastNames[$lastNameIndex];
                }
                break;
            default:
                $lastNameIndex = rand(0, count($lastNames)-1);
                $lastName = $lastNames[$lastNameIndex];
                break;
        }
        $response = [
            'firstName' => $firstName,
            'lastName' => $lastName,
            'race' => $race,
            'class' => $class,
            'weapon' => $weapon
        ];
        return response()->json($response);
    }

    public function find(Int $id){
        $hero = Hero::find($id);
        if($hero == null){
            return response()->json(['message'=>"Hero not found with id $id"], 404);
        }
        return response()->json($hero);
    }

    public function edit(Int $id, Request $request){
        //First I check if the hero exists
        $hero = Hero::find($id);
        if($hero == null){
            return response()->json(['message'=>"Hero not found with id $id"], 404);
        }
        //Validate the request
        $validator = Validator::make($request->all(),
        [
            'firstName' => 'required|string',
            'raceId' => 'required|integer',
            'classId' => 'required|integer',
            'weaponId' => 'required|integer',
            'str' => 'required|integer',
            'dex' => 'required|integer',
            'int' => 'required|integer',
        ]);
        if($validator->fails()){
            return response()->json(["message" => "The hero request lacks data"], 400);
        }
        //Check if the selected data exists
        $race = HeroRace::find($request->raceId);
        if($race == null){
            return response()->json(["message" => "Hero Race not found"], 404);
        }
        $class = HeroClass::find($request->classId);
        if($class == null){
            return response()->json(["message" => "Hero Class not found"], 404);
        }
        $weapon = Weapon::find($request->weaponId);
        if($weapon == null){
            return response()->json(["message" => "Weapon not found"], 404);
        }
        //Now let's see if the data is compatible
        if($race->availableClasses()->find($class->id) == null){
            return response()->json(["message" => "A $race->name can't be a $class->name"], 400);
        }
        if($class->availableWeapons()->find($weapon->id) == null){
            return response()->json(["message" => "A $class->name can't use a $weapon->name"], 400);
        }
        //Finally check if the data is valid
        if($request->str <= 0 || $request->str > 100){
            return response()->json(["message" => "STR cannot be lower or equal than 0 or greater than 100"], 400);
        }
        if($request->dex <= 0 || $request->dex > 100){
            return response()->json(["message" => "DEX cannot be lower or equal than 0 or greater than 100"], 400);
        }
        if($request->int <= 0 || $request->int > 100){
            return response()->json(["message" => "INT cannot be lower or equal than 0 or greater than 100"], 400);
        }

        $hero->firstName = $request->firstName;
        $hero->lastName = $request->lastName;
        $hero->str = $request->str;
        $hero->dex = $request->dex;
        $hero->int = $request->int;
        $hero->hero_race_id = $race->id;
        $hero->hero_class_id = $class->id;
        $hero->weapon_id = $weapon->id;
        $hero->save();

        $name = trim("$hero->firstName $hero->lastName");
        return response()->json(["message" => "Hero $name updated successfully"]);
    }

    public function delete(Int $id){
        $hero = Hero::find($id);
        if($hero == null){
            return response()->json(['message'=>"Hero not found with id $id"], 404);
        }
        $hero->delete();
        $name = trim("$hero->firstName $hero->lastName");
        return response()->json(["message" => "Hero $name deleted successfully"]);
    }
}
