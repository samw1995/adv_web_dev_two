@extends('layouts.master')

@section('title', 'Game Details')

@section('content')
<div class="row">
    <div class="col-md-4">
        <h1>Game Details</h1>
        <h4>{{$game->name}}</h4>
        <p>Rated {{$game->ageRating}}+</p>
        <p>£{{$game->price}}</p>
        <p>{{$game->picture}} will go here</p>
        <p>{{$game->description}}</p>
        <p>{{$game->score}}</p>
        
    </div>
</div>
    @endsection