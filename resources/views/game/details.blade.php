@extends('layouts.master')

@section('title', 'Game Details')

@section('content')
<h1>Game Details</h1>
<div class="row">
    <div class="col-md-4">
        
        <h4>{{$game->name}}<small> by {{$game->developer}}</small></h4>
        <p>{{$game->platform->fullName}}</p>
        <p>Rated {{$game->ageRating}}+</p>
        <p>£{{$game->price}}</p>
        <p>{{$game->picture}} will go here</p>
        <p>{{$game->description}}</p>
        <p>{{$game->genre->name}}</p>
        <p>{{$game->score}}</p>
        <p>Submitted by {{$game->user->name}}</p>
        <div class="row">
        @if(Auth::check() and $game->user_id != Auth::id())
        <form action="{{route('game.delete', [$game->id])}}" method="POST">
            {{ csrf_field() }}
            <input type="hidden" name="{{$game->id}}" value="{{$game->id}}">
            <input class="btn btn-default navbar-btn" type="submit" name="submitBtn" value="Buy">
            </form>
        @elseif($game->user_id != Auth::id())
            <a href="{{url('login')}}">
                <input class="btn btn-default navbar-btn" type="submit" name="submitBtn" value="Buy">
            </a>
        @elseif(Auth::check() and $game->user_id == Auth::id())
             <a href="{{route('game.editform', [$game->id])}}">
             <button type="button" class="btn btn-default navbar-btn">Edit</button>
        </a>
            <form action="{{route('game.delete', [$game->id])}}" method="POST">
                {{ csrf_field() }}
                <input type="hidden" name="{{$game->id}}" value="{{$game->id}}">
                <input class="btn btn-default navbar-btn" type="submit" name="submitBtn" value="Delete">
            </form>
        @endif
        
      
        </div>
    </div>
</div>
    @endsection
