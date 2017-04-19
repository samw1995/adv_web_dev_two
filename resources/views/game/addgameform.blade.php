@extends('layouts.master')

@section('title', 'Add a Game')

@section('content')
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
        <form action="{{url('addgame')}}" method="post">
            {{ csrf_field() }}
            <div>
                <label for="name">Name:</label>
                <input type="text" name="name" id="name" value="{{old('name')}}">
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
                <label for="price">Price</label>
                <input type="text" name="price" id="price" value="{{old('price')}}">
            </div>
            <div>
                <label for="score">Score</label>
                <input type="number" name="score" id="score" min="1" max="10" value="{{old('score')}}">
            </div>
                <input type="submit" name="submitBtn" value="Add Game">
        </form>
    </div>
</div>
    @endsection