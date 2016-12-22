@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="col-md-8 col-md-offset-2">
            <h2>Create or join existing league</h2>

            <div class="btn-group btn-group-justified">
                <a href="{{url('nba/createleague')}}" class="btn btn-primary">Create league</a>
                <a href="{{url('nba/joinleague')}}" class="btn btn-primary">Join league</a>
            </div>
        </div>
    </div>

    <input type="hidden" value="{{Auth::User()->id}}" name="user_id">

    <div class="row">
        <div class="col-md-8 col-md-offset-3">
            <h3>List of your teams : </h3>

            @foreach($tm_sett as $tm_set)
                @if(Auth::User()->id == $tm_set->user_id)
                <ol>
                <li><a href="{{url('league'/*, $tm_set->league_id*/)}}" class="btn btn-default btn-primary">{{$tm_set->team_name}}</a></li>
                </ol>
                @endif
            @endforeach
        </div>
    </div>


@endsection