@extends('league')

@section('content')

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