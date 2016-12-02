@extends('league')

@section('content')

<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <h3>{{$messageBoard->topic}}</h3>

        <p class="lead">{{$messageBoard->message}}</p>
    </div>

    <div class="col-md-4 col-md-offset-2">
        <div class="well">
            <dl class="dl-horizontal">
                <dt>Created at : </dt>
                <dd>{{$messageBoard->created_at}}</dd>
            </dl>

            <dl class="dl-horizontal">
                <dt>Last Updated : </dt>
                <dd>{{$messageBoard->updated_at}}</dd>
            </dl>
        </div>
    </div>
</div>



@endsection