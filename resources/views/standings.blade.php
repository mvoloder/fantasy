@extends('league')

@section('content')

<div class="container" align="center">
    <h2> Your League Standings</h2>

    <table class="table">
        <thead>
        <tr>
            <th>Rank</th>
            <th>Team</th>
            <th>W - L - T</th>
            <th>Pct</th>
        </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>My Team</td>
                <td>7 - 2 - 0</td>
                <td>0.77778</td>
            </tr>
        </tbody>
    </table>

</div>

@endsection