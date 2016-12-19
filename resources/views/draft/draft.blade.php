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
    {{-- on generate click message --}}
    <script>
        function myFunction() {
            alert("Matchups Generated");
        }
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
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <div class="row">
                    <div class="col-md-10 col-lg-offset-3">
                        <h2 align="center">Draft Page</h2>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    @yield('content')
    <form class="form-horizontal" role="form" method="POST" action="/draft">
        {{csrf_field()}}
        {{-- Submit pick draft button --}}
    <div class="container">
        <div class="col-md" align="center">
            <button type="submit" class="btn btn-primary">
                Draft player
            </button>
        </div>

        {{-- List of draftable players --}}
        <div class="row">
            <div class="col-md-8">
                <h3 align="center">List of players to draft</h3>
                <ol>
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Field goal</th>
                            <th>Free throws</th>
                            <th>Points</th>
                            <th>Rebounds</th>
                            <th>Assists</th>
                            <th>Steals</th>
                            <th>Blocks</th>
                            <th>TOs</th>
                        </tr>
                        </thead>
                        @foreach($undrafted as $value)
                            @foreach($players as $player)
                                @if($value == $player->id)
                                    <tbody>
                                    <tr>
                                        <td><label><input type="checkbox" name="player-{{$player->id}}">{{$player->first_name . " " . $player->last_name}}
                                            </label></td>
                                        <td>{{$player->field_goal}}</td>
                                        <td>{{$player->free_throws}}</td>
                                        <td>{{$player->points}}</td>
                                        <td>{{$player->rebounds}}</td>
                                        <td>{{$player->assists}}</td>
                                        <td>{{$player->steals}}</td>
                                        <td>{{$player->blocks}}</td>
                                        <td>{{$player->turnovers}}</td>
                                    </tr>
                                    {{--<input type="hidden" name="player_id" value={{$index}}>--}}
                                    </tbody>
                                @endif
                            @endforeach
                        @endforeach
                    </table>
                </ol>
            </div>

            {{-- List of user's draft picks --}}
            <div class="col-md-3">
                <h3 align="center">Your picks :</h3>
                <table class="table">
                    <tbody>
                    @foreach($spiller as $spill)
                        <tr>
                            <ol>
                                <td><li>{{$spill->first_name . " " . $spill->last_name}}</li></td>
                            </ol>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
        <input type="hidden" value="{{Auth::User()->id}}" name="user_id">
        <input type="hidden" value="{{$leagueId}}" name="league_id">
    </form>
</div>

<!-- Scripts -->
<script src="/js/app.js"></script>
</body>
</html>
