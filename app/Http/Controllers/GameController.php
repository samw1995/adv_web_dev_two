<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class GameController extends Controller
{
    function index()
    {
        return view('game/allgames',['pageTitle'=>"All Games"]);
    }
    
    function details($gameId)
    {
        return " Controller - Details for game " .$gameId;
    }
    
    function addGameForm()
    {
        return "controller - show the add game form";
    }
    
    function addGame(Request $request)
    {
        return "controller - add a game";
    }
    
    function deleteGameForm()
    {
        return "controller - show the delete game form";
    }
    
    function deleteGame()
    {
        return "controller - deletes the game";
    }
    
    function editGame()
    {
        return "controller - show all games";
    }
    
    function updateGame()
    {
        return "controller - show all games";
    }
}
