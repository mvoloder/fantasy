@extends('league')

@section('content')
{{--<div class="container-fluid" align="center">--}}
    {{--<h2>Message board</h2>--}}

    {{--<form>--}}
        {{--<div class="form-group">--}}
            {{--<label for="topic">Topic : </label>--}}
            {{--<textarea class="form-control input-sm" rows="1" id="topic"></textarea>--}}
            {{--<label for="text">Text : </label>--}}
            {{--<textarea class="form-control input" rows="3" id="text"></textarea>--}}
            {{--<button type="button" class="btn btn-primary btn-md">Save message</button>--}}
        {{--</div>--}}
    {{--</form>--}}
{{--</div>--}}

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h3> New topic </h3>
            <hr>
            {!! Form::open(array('url' => 'messageboard')) !!}
                {{Form::label('topic', 'Topic:')}}
                {{Form::text('topic', null, array('class' => 'form-control'))}}

                {{Form::label('message', 'Message:')}}
                {{Form::textarea('message', null, array('class' => 'form-control'))}}

                {{Form::submit('Post', array('class' => 'btn btn-success bnt-lg btn-block', 'style' => 'margin-top:10px'))}}
            {!! Form::close() !!}
        </div>
    </div>


@endsection