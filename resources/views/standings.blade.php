@extends('league')

@section('content')
    @foreach($weeks as $week)
    <form class="form-horizontal" role="form" method="POST" action="/standings">
        <div class="container">
            <div class="col-md-12 btn-group">
                        @for($i = 0; $i < count($week); $i++)
                            <button class="btn btn-primary" type="submit">Simulate week {{$week->id}}</button>
                            <input type="hidden" name="simulate"  value="{{$week->id}}">
                            <input type="hidden" name="game" value="{{$week->games}}">
                        @endfor

            </div>
        </div>
        {{csrf_field()}}
        <p></p>
    </form>
    @endforeach

<div class="container" align="center">
    <h2> Your League Standings</h2>

    <table class="table">
        <thead>

        <tr>
            <th>Rank</th>
            <th>Team</th>
            <th>W - L</th>
            <th>Pct</th>
        </tr>
        </thead>
        <tbody>
            <tr>
                <td><ol><li></li></ol></td>
                <td>My Team</td>
                <td>7 - 2</td>
                <td>0.77778</td>
            </tr>
        </tbody>
    </table>

</div>

@endsection