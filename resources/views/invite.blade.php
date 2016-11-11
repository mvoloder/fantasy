@extends('layouts.app')

@section('title', 'Page Title')

@section('content')

    <h3 style="text-align:center;">Invite your friends via e-mail</h3>

    <div class="flex-center position-ref full-height">

        <form action="{{url('nba/team/invite')}}" method="POST">


            <input type="email" name="email" placeholder="mail address">
            <input type="text" name="test" placeholder="test">
            <button type="submit">Send mail</button>
            {{csrf_field()}}
        </form>
    </div>

@endsection
