<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Game;

class GameController extends Controller
{
    function index()
    {
        $games = Game::all();
        return view('game/allgames',['games' => $games]);
    }
    
    function details($gameId)
    {
        $game = Game::find($gameId);
        return view('game/details',['game' => $game]);
    }
    
    function addGameForm()
    {
        return view('game/addgameform',['pageTitle'=>"Add a Game"]);
    }
    
    function addGame(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'picture' => 'required',
            'description' => 'required|max:2000',
            'price' => 'required|numeric|min:00.01',
            'score' => 'required|integer|min:1|max:10'
        ]);
        $game = new Game();
        $game->name = $request->name;
        $game->picture = $request->picture;
        $game->ageRating = $request->age;
        $game->description = $request->description;
        $game->price = $request->price;
        $game->score = $request->score;
        
        $game->save();
        return redirect('all');
    }
    
    
    function deleteGame(Request $request, $id)
    {
        $game = Game::findorFail($id);
        $game->delete();
        return redirect('all');
    }
    
    function editGame()
    {
        
    }
    
    function updateGame()
    {
        
    }
}
