<?php

namespace App\Http\Controllers;

//include Player model
use App\Player;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Laravel\Lumen\Routing\Controller as BaseController;

class FixtureController extends BaseController
{
    
    //get all team matches
    public function getList(){
    	$results = app('db')->select("SELECT tm.*,t.team_name as team_1_name, 
                                        t1.team_name as team_2_name                  
                                      FROM team_match tm 
                                      left join teams t on tm.team_1=t.id 
                                      left join teams t1 on tm.team_2=t1.id
                                      ");
    	//$results = DB::table('players')->where('team_id', $team_id);
    	return response()->json($results,200);

    }
    




}
