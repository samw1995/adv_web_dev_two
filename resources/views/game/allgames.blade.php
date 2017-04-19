@extends('layouts.master')

@section('title', 'View All Games')

@section('content')
<div class="row">
    <div class="col-md-4">
        <h1>View All Games</h1>
    </div>
        @foreach ($games as $game)
            
            <p>
                <a href="{{route('game.details', [$game->id])}}">{{$game->name}}</a>
                </p>
                @endforeach
         
</div>
    @endsection