<?php

namespace App\Http\Controllers;

//include Player model
use App\Player;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Laravel\Lumen\Routing\Controller as BaseController;

class PlayerController extends BaseController
{
    //show all Player
    public function getPlayerList(){

    	return response()->json(Player::all());

    }

    //get Player by Id
    public function getPlayerById($id){
    	return response()->json(Player::find($id),200);
    }


    //get all player of a team
    public function getPlayerByTeamId($team_id){
    	$results = app('db')->select("SELECT * FROM players where team_id=$team_id");
    	//$results = DB::table('players')->where('team_id', $team_id);
    	return response()->json($results,200);

    }
    


    //create Player 
    public function create(Request $request)
    {	

    	$this->validate($request, [
            'first_name' => 'required',
            'country' => 'required',
            'team_id' => 'required'
        ]);

        $input = $request->all();

        $player = Player::create($input);

        return response()->json($player, 201);
    }

}
