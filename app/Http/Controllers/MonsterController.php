<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Monster;
use App\MonsterRace;
use App\MonsterAbility;

use App\Services\MonsterService;

class MonsterController extends Controller
{
    public function dashboard(){
        $monsters = Monster::all();
        $races = MonsterRace::all();
        $abilities = MonsterAbility::all();
        $mostPopularRace = null;
        $mostPopularAbility = null;
        $mostPopular = 0;
        foreach($races as $race){
            $count = $race->knownMonsters()->count();
            if($count > $mostPopular){
                $mostPopularRace = $race;
                $mostPopular = $count;
            }
        }
        $mostPopular = 0;
        foreach($abilities as $ability){
            $count = $ability->knownMonsters()->count();
            if($count > $mostPopular){
                $mostPopularAbility = $ability;
                $mostPopular = $count;
            }
        }
        $result = [
            'available' => $monsters->count(),
            'mostPopularRace' => $mostPopularRace,
            'mostPopularAbility' => $mostPopularAbility,
        ];
        return response()->json($result);
    }

    public function list(){
        $monsters = Monster::with('race')->with('abilities')->get();
        if($monsters->isEmpty()){
            return response()->json(['message'=>"There aren't any Monsters registered"], 404);
        }
        return response()->json($monsters);
    }

    public function random(){
        $service = new MonsterService();
        $race = MonsterRace::all()->random();
        $availableAbilities = $race->availableAbilities();
        $randomTake = rand(1, $availableAbilities->count());
        $abilities = $availableAbilities->inRandomOrder()->take($randomTake)->get();
        $name = $service->generateRandomName($race->name);
        $picture = $service->generateRandomPicture();
        $result = [
            'name' => $name,
            'race' => $race,
            'abilities' => $abilities,
            'picture' => $picture
        ];
        return response()->json($result);
    }

    public function find(Int $id){
        $monster = Monster::find($id);
        if($monster == null){
            return response()->json(['message'=>"Monster not found with id $id"], 404);
        }
        return response()->json($monster->with('race')->with('abilities')->find($id));
    }

    public function create(Request $request){
        $validator = Validator::make($request->all(),
        [
            'name' => 'required|string',
            'raceId' => 'required|integer',
            'abilities' => 'present|array',
            'str' => 'required|integer',
            'dex' => 'required|integer',
            'int' => 'required|integer',
            'picture' => 'required|string',
        ]);
        if($validator->fails()){
            return response()->json(["message" => "The monster request lacks data"], 400);
        }
        //Check if the selected data exists
        $race = MonsterRace::find($request->raceId);
        if($race == null){
            return response()->json(["message" => "Monster Race not found"], 404);
        }
        // Check if te selected abilities are valid and fetch the abilities entities from the DB
        $abilities = [];
        $usedAbIds = []; // Array for storing the ID of the abilities already fetched
        foreach($request->abilities as $abilityId){
            $ability = MonsterAbility::find($abilityId);
            if($ability == null){
                return response()->json(['message' => 'Monster ability not found'], 404);
            }
            if($race->availableAbilities()->find($abilityId) == null){
                return response()->json(["message" => "A $race->name can't use $ability->name"], 400);
            }
            if(!in_array($ability->id, $usedAbIds)){
                $abilities[] = $ability;
                $usedAbIds[] = $ability->id;
            }
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
        if(count($abilities) == 0){
            return response()->json(["message" => "Your monster needs at least 1 ability"], 400);
        }
        //Actual creation of the monster with initial state
        $level = (count($abilities) * 2) - 1;
        $monster = new Monster();
        $monster->name = $request->name;
        $monster->str = $request->str;
        $monster->dex = $request->dex;
        $monster->int = $request->int;
        $monster->picture = $request->picture;
        $monster->monster_race_id = $race->id;
        $monster->level = $level;
        $monster->save();
        foreach($abilities as $ability){
            $monster->abilities()->save($ability);
        }
        $monster->save();

        return response()->json(["message" => "$race->name $monster->name level $level created successfully"]);
    }

    public function delete(Int $id){
        $monster = Monster::find($id);
        if($monster == null){
            return response()->json(['message'=>"Monster not found with id $id"], 404);
        }
        $monster->delete();
        return response()->json(['message' => $monster->name." deleted successfully"]);
    }

    public function edit(Int $id, Request $request){
        $monster = Monster::find($id);
        if($monster == null){
            return response()->json(['message'=>"Monster not found with id $id"], 404);
        }
        $validator = Validator::make($request->all(),
        [
            'name' => 'required|string',
            'raceId' => 'required|integer',
            'abilities' => 'present|array',
            'str' => 'required|integer',
            'dex' => 'required|integer',
            'int' => 'required|integer',
            'picture' => 'required|string',
        ]);
        if($validator->fails()){
            return response()->json(["message" => "The monster request lacks data"], 400);
        }
        //Check if the selected data exists
        $race = MonsterRace::find($request->raceId);
        if($race == null){
            return response()->json(["message" => "Monster Race not found"], 404);
        }
        // Check if te selected abilities are valid and fetch the abilities entities from the DB
        $abilities = [];
        $usedAbIds = []; // Array for storing the ID of the abilities already fetched
        foreach($request->abilities as $abilityId){
            $ability = MonsterAbility::find($abilityId);
            if($ability == null){
                return response()->json(['message' => 'Monster ability not found'], 404);
            }
            if($race->availableAbilities()->find($abilityId) == null){
                return response()->json(["message" => "A $race->name can't use $ability->name"], 400);
            }
            if(!in_array($ability->id, $usedAbIds)){
                $abilities[] = $ability;
                $usedAbIds[] = $ability->id;
            }
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
        if(count($abilities) == 0){
            return response()->json(["message" => "Your monster needs at least 1 ability"], 400);
        }
        //Actual creation of the monster with initial state
        $level = (count($abilities) * 2) - 1;
        $monster->name = $request->name;
        $monster->str = $request->str;
        $monster->dex = $request->dex;
        $monster->int = $request->int;
        $monster->picture = $request->picture;
        $monster->monster_race_id = $race->id;
        $monster->level = $level;
        $monster->abilities()->sync([]); //clear the old abilities
        foreach($abilities as $ability){
            $monster->abilities()->save($ability);
        }
        $monster->save();

        return response()->json(["message" => "$race->name $monster->name level $level updated successfully"]);
    }
}
