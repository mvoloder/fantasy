@extends('layouts.app')

@section('title', 'Page Title')

@section('sidebar')
    @parent

    <p>This is appended to the master sidebar.</p>
@endsection

@section('content')

    <div class="container">
        <h2>Choose sport</h2>
        <div class="btn-group btn-group-justified">
            <a href="{{url('/nba')}}" class="btn btn-primary">NBA</a>
            <a href="#" class="btn btn-primary">NFL</a>
            <a href="#" class="btn btn-primary">MLB</a>
            <a href="#" class="btn btn-primary">NHL</a>
        </div>

    </div>





@endsection