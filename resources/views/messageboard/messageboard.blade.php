@extends('league')

@section('content')


    <div class="row">
        <div class="col-md-10 col-md-offset-2">
            <h1>It's a board !</h1>
        </div>

        <div class="col-md-2 col-md-offset-8">
            <a href="{{route('messageboard.create')}}" class="btn btn-lg btn-block btn-primary">Write a message</a>
            <hr>
        </div>

        <div class="col-md-12">
            <hr>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <table class="table">
                <thead>
                <th>#</th>
                <th>Topic</th>
                <th>Message</th>
                <th>Created at</th>
                <th>Updated at</th>
                </thead>

                <tbody>
                    @foreach($messageBoards as $messageBoard)

                        <tr>
                            <th>{{$messageBoard->id}}</th>
                            <td>{{$messageBoard->topic}}</td>
                            <td>{{substr($messageBoard->message, 0, 30)}}</td>
                            <td>{{$messageBoard->created_at}}</td>
                            <td>{{$messageBoard->updated_at}}</td>
                            <td><a href="{{route('messageboard.show', $messageBoard->id)}}" class="btn btn-default">View</a></td>
                        </tr>
                        @endforeach
                </tbody>
            </table>
        </div>
    </div>


@endsection