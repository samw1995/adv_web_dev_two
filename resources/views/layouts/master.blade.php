<html>
    <head>
        <title>@yield('title')</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link href="{{asset('/css/style.css')}}" rel="stylesheet" type="text/css">
    </head>
    <body>
        @section('header')
        <nav class="navbar navbar-default">
            <div class="container">
                <div class="navbar-header">
                  <a class="navbar-brand" href="{{route('game.all')}}">The Game Shop</a>
                </div>
                <a href="{{route('game.addform')}}">
                    <button type="button" class="btn btn-default navbar-btn">Add a Game</button>
                    </a>
                
                @if(Auth::check())
                 <a href="{{route('user.logout')}}">
                    <button type="button" class="btn btn-default navbar-btn">Sign Out</button>
                    </a>
                {{$user = Auth::user()}}
                <p>Hello <a href="{{route('user.usergames')}}">{{$user->name}}</a></p>
                @else
                <a href="{{url('login')}}">
                    <button type="button" class="btn btn-default navbar-btn">Sign In</button>
                    </a>
                <a href="{{url('register')}}">
                    <button type="button" class="btn btn-default navbar-btn">Sign Up</button>
                    </a>
                @endif
            </div>
           
        </nav>
        @show

        <div class="container">
            @yield('content')     
        </div>
        @section('footer')
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        @show
    </body>
</html>