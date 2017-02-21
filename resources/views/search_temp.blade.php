<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>
<div id="app">
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                {{-- <a class="navbar-brand" href="{{ url('/') }}">
                     {{ config('app.name', 'Laravel') }}
                 </a>--}}

            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    &nbsp;
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li><a href="{{ url('/search') }}">Talent Search</a></li>

                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Login</a></li>
                        <li><a href="{{ url('/register') }}">Register</a></li>
                    @else

                        <li><a href="{{ url('/post') }}">Forum</a></li>

                        <li><a href="{{ url('/home') }}">Profile</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li> <a href="{{ url('/edit', $authUser->id) }}">Edit</a> </li>
                                <li>
                                    <a href="{{ url('/logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')
</div>

<!-- Scripts -->
<script src="/js/app.js"></script>

    <div class="well">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <p>Select the specific skills and search for talent with that skills.</p>

                {!! Form::open(array('route' => 'searchResult') ) !!}
                <div class="form-group">
                @if(count($skills))
                    @foreach($skills as $skill)


                        {{ Form::checkbox('skill[]', $skill->id) }}
                        {{ Form::label('skill', $skill->name) }}

                        <!-- <tr>
                            <td>{{ $skill->id }}</td>
                            <td>{{ $skill->name }}</td>

                          </tr> -->
                        @endforeach
                    @else
                        No data found
                    @endif
                </div>

                <div class="form-group">
                    {{ Form::submit('Search', ['class' => 'btn btn-success']) }}
                </div>
                {!! Form::close() !!}
            </div>
        </div>


    </div>

</body>
</html>