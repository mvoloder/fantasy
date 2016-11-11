@extends('layouts.app')

@section('title', 'Page Title')

@section('content')

    <form class="form-horizontal" role="form" method="POST" action="{{url('nba/team')}}">
        {{csrf_field()}}

        <h3 style="text-align:center;">Invite your friends via e-mail</h3>

        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

            <input type="email" name="email" placeholder="mail address">
            <input type="text" name="bizovac" placeholder="bizovac">
            <button type="submit">Send mail</button>

        </div>
    </form>

@endsection
