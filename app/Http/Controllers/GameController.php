<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Game;
use App\Platform;
use App\Genre;

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
        $platforms = Platform::all();
        $genres = Genre::all();
        return view('game/addgameform',['pageTitle'=>"Add a Game",'platforms' => $platforms, 'genres' => $genres]);
    }
    
    function addGame(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'developer' => 'required',
            'picture' => 'required',
            'description' => 'required|max:2000',
            'price' => 'required|numeric|min:00.01',
            'score' => 'required|integer|min:1|max:10'
        ]);
        $game = new Game();
        $game->name = $request->name;
        $game->developer = $request->developer;
        $game->picture = $request->picture;
        $game->ageRating = $request->age;
        $game->description = $request->description;
        $game->price = $request->price;
        $game->score = $request->score;
        
        $platform = Platform::find($request->platform);
        $game->platform()->associate($platform);   
        $genre = Genre::find($request->genre);
        $game->genre()->associate($genre);
        $game->save();
        
        return redirect('all');
    }
    
    
    function deleteGame(Request $request, $id)
    {
        $game = Game::findorFail($id);
        $game->delete();
        return redirect('all');
    }
    
    function editGame($gameId)
    {
        $game = Game::find($gameId);
        $platforms = Platform::all();
        $genres = Genre::all();
        return view('game/editform',['game' => $game,'platforms' => $platforms, 'genres' => $genres]);
    }
    
    function updateGame(Request $request, $gameId)
    {
        $this->validate($request, [
            'name' => 'required',
            'developer' => 'required',
            'picture' => 'required',
            'description' => 'required|max:2000',
            'price' => 'required|numeric|min:00.01',
            'score' => 'required|integer|min:1|max:10'
        ]);
        
        $game = Game::find($gameId);
        $platform = Platform::find($request->platform);
        $game->platform()->associate($platform);   
        $genre = Genre::find($request->genre);
        $game->genre()->associate($genre);
        $game->update($request->all());
        
        return redirect('all');
    }
}
