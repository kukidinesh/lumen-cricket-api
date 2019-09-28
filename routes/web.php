<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return "welcome";
});

$router->group(['prefix' => 'api'], function() use ($router){

	//load all teams
	$router->get('teams', ['uses'=> 'TeamController@getTeamList']);


	//load team by team id
	$router->get('team/{id}', ['uses'=> 'TeamController@getTeamById']);
});

$router->group(['prefix' => 'api'], function() use ($router){

	//load all Players
	$router->get('players', ['uses'=> 'PlayerController@getPlayerList']);


	//load Player by player id
	$router->get('player/{id}', ['uses'=> 'PlayerController@getPlayerById']);

	//get players by team id
	$router->get('playerFromTeam/{team_id}', ['uses'=> 'PlayerController@getPlayerByTeamId']);

	$router->post('player', ['uses' => 'PlayerController@create']);

});
