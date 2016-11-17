<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <title>Draft</title>

    <style>
        #wrapper {
            width: auto;
            height: auto;
            background-color: darkgrey;
        }

        #banner {
            width: auto;
            height: 150px;
            background-color: #0D3349;
        }

        #menuTop {
            width: auto;
            height: 50px;
            background-color: #7a43b6;
        }

        #columnLeft {
            overflow: scroll;
            width: 20%;
            height: 420px;
            background-color: cornflowerblue;
            float: left;
        }

        #columnRight {
            overflow: scroll;
            width: 20%;
            height: 420px;
            background-color: wheat;
            float: right;
        }

        #content {
            overflow: scroll;
            width: 60%;
            height: 420px;
            background-color: darkgrey;
            margin-left: 220px;
        }

        #footer {
            width: auto;
            height: 30px;
            background-color: darkslateblue;
        }


    </style>
</head>
<body>

<div id="wrapper">

    <div id="banner">
        {{--<h1 align="center" id="player">{{$player}}</h1>--}}
    </div>
    <div id="menuTop" align="center">

    </div>
    <div id="columnLeft">
        <h3>Draft order :</h3>
        @foreach($players as $player)
            <li>{{$player->first_name}}</li>
        @endforeach
    </div>
    <div id="columnRight">
        <h3>Your picks :</h3>
        @foreach($players as $player)
            <li>{{$player->first_name}}</li>
        @endforeach
    </div>
    <div id="content">
        <h3 align="center">List of players to draft</h3>
        <ol>
            <table class="table table-bordered">
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

                @foreach($players as $player)
                    <tbody>
                        <tr>
                            <td>{{$player->first_name . " " . $player->last_name}}</td>
                            <td>{{$player->field_goal}}</td>
                            <td>{{$player->free_throws}}</td>
                            <td>{{$player->points}}</td>
                            <td>{{$player->rebounds}}</td>
                            <td>{{$player->assists}}</td>
                            <td>{{$player->steals}}</td>
                            <td>{{$player->blocks}}</td>
                            <td>{{$player->turnovers}}</td>
                        </tr>
                    </tbody>
                @endforeach
            </table>
        </ol>
    </div>
    <div id="footer">
        <h3 align="center">Good luck everybody</h3>
    </div>
</div>


</body>
</html>
