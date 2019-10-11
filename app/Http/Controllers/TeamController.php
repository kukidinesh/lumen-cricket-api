<?php

namespace App\Http\Controllers;

//include team model
use App\Team;
use Illuminate\Http\Request;

use Laravel\Lumen\Routing\Controller as BaseController;

class TeamController extends BaseController
{
    //show all team
    public function getTeamList(){
    	
    	return response()->json(Team::all());

    }

    //get team by Id
    public function getTeamById($id){
    	return response()->json(Team::find($id),200);
    }
}
