@extends('layouts.master')

@section('title', 'View All Games')

@section('content')
<div class="row">
    <div class="col-md-4">
        <h1>Your Listings</h1>
    </div>
   
        @foreach ($games as $game)
             @if($game->user_id === Auth::id())
                <p>
                    <a href="{{route('game.details', [$game->id])}}">{{$game->name}} - ({{$game->developer}})</a>
                </p>
            @endif 
        @endforeach
        
</div>
    @endsection