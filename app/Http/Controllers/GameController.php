<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Game;
use App\Platform;
use App\Genre;
use App\User;

class GameController extends Controller
{
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }
    function index(Request $request)
   {
        $query = $request->searchTerm;
        
        $games = $query ? Game::search($query)->get() : Game::all();
        return view('game/allgames', compact('games'));
    }
    
    function userGames()
    {
        $games = Game::all();
        return view('game/usergames',['games' => $games]);
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
        
        if($request->hasFile('picture'))
        {   
            $file = $request->file('picture');
            $image_name = $file->getClientOriginalName();
            $file->move(public_path().'/images/', $image_name);
            $game->picture = $image_name;
        }
        else{
            return redirect('usergames');
        }
        
        $game->ageRating = $request->age;
        $game->description = $request->description;
        $game->price = $request->price;
        $game->score = $request->score;
        
        $platform = Platform::find($request->platform);
        $game->platform()->associate($platform);   
        $genre = Genre::find($request->genre);
        $game->genre()->associate($genre);
        $user = User::find($request->user);
        $game->user()->associate($user);
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
//
// {
//        $games = Game::all();
//        return view('game/allgames',['games' => $games]);
//    }
