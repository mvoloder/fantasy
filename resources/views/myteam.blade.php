@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <form class="form-horizontal" role="form" method="get" action="/myteam">
        {{csrf_field()}}
        <div>
            <h3 align="center">My team</h3>
            <ol>
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>Position</th>
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

                    <tbody>
                    @foreach($players as $player)
                        <tr>
                            <td><button type="button" class="btn btn-primary btn-md">{{$player->position}}</button></td>
                            <td>{{$player->first_name . " " . $player->last_name}}</td>
                            <td>{{$player->field_goal}}</td>
                            <td>{{$player->free_throws}}</td>
                            <td>{{$player->points}}</td>
                            <td>{{$player->rebounds}}</td>
                            <td>{{$player->assists}}</td>
                            <td>{{$player->steals}}</td>
                            <td>{{$player->blocks}}</td>
                            <td>{{$player->turnovers}}<br></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </ol>
        </div>
        <input type="hidden" value="{{Auth::User()->id}}" name="user_id">

    </form>

@endsection