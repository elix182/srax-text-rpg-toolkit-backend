<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Monster;
use App\MonsterRace;
use App\MonsterAbility;

class MonsterController extends Controller
{
    public function list(){
        $monsters = Monster::all();
        if($monsters->isEmpty()){
            return response()->json(['message'=>"There aren't any Monsters registered"], 404);
        }
        return response()->json($monsters);
    }

    public function random(){

    }

    public function find(Int $id){
        $monster = Monster::find($id);
        if($monster == null){
            return response()->json(['message'=>"Monster not found with id $id"], 404);
        }
        return response()->json($monster);
    }

    public function create(Request $request){

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

    }
}
