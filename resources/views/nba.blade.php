@extends('layouts.app')

@section('content')

    <div class="container">

        <h2>Create or join existing league</h2>

        <div class="btn-group btn-group-justified">
            <a href="{{url('nba/createleague')}}" class="btn btn-primary">Create league</a>
            <a href="{{url('nba/joinleague')}}" class="btn btn-primary">Join league</a>
        </div>

    </div>

    <div class="container">

        <h3>List of your leagues</h3>

        {{--@foreach($team_settings as $team_setting)--}}
            {{--{{$team_setting->team_name}}--}}
            {{--@endforeach--}}


    </div>


@endsection