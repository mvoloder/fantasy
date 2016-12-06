@extends('league')

@section('content')

    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <h3>All players : </h3>
            <hr>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <table class="table">




                <thead>
                    <th>#</th>
                    <th>Name</th>
                    <th>Position</th>
                    <th>Field goal</th>
                    <th>Free throws</th>
                    <th>Points</th>
                    <th>Rebounds</th>
                    <th>Assists</th>
                    <th>Steals</th>
                    <th>Blocks</th>
                    <th>Turnovers</th>
                </thead>
                @foreach($undrafted as $value)
                @foreach($players as $player)
                    @if($value == $player->id)
                    <tr>
                        <th>{{$player->id}}</th>
                        <td><button type="button" class="btn btn-primary">{{$player->position}}</button></td>
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
                        @endif
                @endforeach
                @endforeach
            </table>
        </div>
    </div>



@endsection