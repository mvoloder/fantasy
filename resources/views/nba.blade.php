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

    <div class="row">
        <div class="col-md-8 col-md-offset-3">
            <h3>List of your teams : </h3>

            @foreach($user_leagues as $user_league)
                <ol>
                <li><a href="/league"><button type="button" class="btn btn-defautl">{{$user_league}}</button></a></li>
                </ol>
            @endforeach
        </div>
    </div>


@endsection