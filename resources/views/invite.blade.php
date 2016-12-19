@extends('layouts.app')

@section('title', 'Page Title')

@section('content')

    <h3 style="text-align:center;">Invite your friends via e-mail</h3>

    <div class="flex-center position-ref full-height">

        <form action="{{url('nba/team/invite')}}" method="POST">


            <input type="email" name="email" placeholder="mail address">
            <input type="text" name="id" placeholder="id">
            <input type="text" name="pass" placeholder="pass">
            <button type="submit">Send mail</button>
            {{csrf_field()}}

            <div class="container">
                <p>Go main menu</p>
                <hr>
                <a href="/"><button class="btn btn-primary" type="button">Done</button></a>
            </div>
        </form>
    </div>

@endsection
