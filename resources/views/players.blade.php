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

                @foreach($undrafted as $und)
                    <tr>
                        <th>{{$und->id}}</th>
                        <td>{{$und->first_name . " " . $und->last_name}}</td>
                        <td>{{$und->position}}</td>
                        <td>{{$und->field_goal}}</td>
                        <td>{{$und->free_throws}}</td>
                        <td>{{$und->points}}</td>
                        <td>{{$und->rebounds}}</td>
                        <td>{{$und->assists}}</td>
                        <td>{{$und->steals}}</td>
                        <td>{{$und->blocks}}</td>
                        <td>{{$und->turnovers}}</td>
                    </tr>
                    @endforeach
            </table>
        </div>
    </div>



@endsection