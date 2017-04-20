@extends('layouts.master')

@section('title', 'Add a Game')

@section('content')

@if(Auth::check())

@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="row">
    <div class="col-md-4">
        <h1>Add a Game</h1>
        <form action="{{route('game.add')}}" method="post">
            {{ csrf_field() }}
            <div>
                <label for="name">Name:</label>
                <input type="text" name="name" id="name" value="{{old('name')}}">
            </div>
            <div>
                <label for="developer">Developer:</label>
                <input type="text" name="developer" id="developer" value="{{old('developer')}}">
            </div>
            <div>
                <label for="platform">Platform</label>
                <select name="platform" id="platform">
                    @foreach($platforms as $platform) 
                    <option value="{{$platform->id}}">{{$platform->fullName}}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="picture">Upload a Image:</label>
                <input type="text" name="picture" id="picture">
            </div>
            <div>
                <label for="age">Age Rating</label>
                <select name="age" id="age">
                    <option value="3" selected>3+</option>
                    <option value="7">7+</option>
                    <option value="12">12+</option>
                    <option value="16">16+</option>
                    <option value="18">18+</option>     
                </select>
            </div>
            <div>
                <label for="description">Description</label>
                <textarea name="description" id="description" cols="30" rows="4">{{old('description')}}</textarea>
            </div>
            <div>
                <label for="genre">Genre</label>
                <select name="genre" id="genre">
                    @foreach($genres as $genre) 
                    <option value="{{$genre->id}}">{{$genre->name}}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="price">Price</label>
                <input type="text" name="price" id="price" value="{{old('price')}}">
            </div>
            <div>
                <label for="score">Score</label>
                <input type="number" name="score" id="score" min="1" max="10" value="{{old('score')}}">
            </div>
            <div >
           
                <p class="userId">{{$userId = Auth::id()}}</p>
                <input type="hidden" name="user" id="user" value="{{$userId}}">
            </div>
            
                <input type="submit" name="submitBtn" value="Add Game">
        </form>
    </div>
</div>
@else
<p>Please <a href="{{url('login')}}">Log In</a></p>
@endif

    @endsection