@extends('layouts.app')

@section('content')

    <button class="btn btn-block btn-primary">simulate</button>
    <div class="container">
        <table class="table table-hover">
            <thead>
            <tr>
                <th>marko</th>
                <th>ivo</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>team1 score</td>
                <td>team2 score</td>
            </tr>
            </tbody>
        </table>
    </div>
    <table width="100%" border=0>
        <tr>
            {{--LEFT SIDE--}}
            <td align="center">
                
            </td>
            <td class="divider">
                <div class="container">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>Team</th>
                            <th>FG%</th>
                            <th>FT%</th>
                            <th>PTS</th>
                            <th>REB</th>
                            <th>AST</th>
                            <th>ST</th>
                            <th>BLK</th>
                            <th>TO</th>
                            <th>Score</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>marko</td>
                            <td>0.57</td>
                            <td>0.88</td>
                            <td>143</td>
                            <td>37</td>
                            <td>28</td>
                            <td>15</td>
                            <td>9</td>
                            <td>17</td>
                            <td>7</td>
                        </tr>
                        <tr>
                            <td>ivo</td>
                            <td>0.43</td>
                            <td>0.78</td>
                            <td>225</td>
                            <td>25</td>
                            <td>8</td>
                            <td>4</td>
                            <td>2</td>
                            <td>37</td>
                            <td>1</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </td>

            {{--RIGHT SIDE--}}
            <td align="center">

            </td>
        </tr>
    </table>
    <hr>
    <div class="container">
        <table class="table table-hover">
            <thead>

            <tr>
                <th>marko</th>
                <th>ivo</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <table class="table table-hover">
                    <thead>
                    <th>Player</th>
                    <th>FG%</th>
                    <th>FT%</th>
                    <th>PTS</th>
                    <th>REB</th>
                    <th>AST</th>
                    <th>ST</th>
                    <th>BLK</th>
                    <th>TO</th>

                    <th>Player</th>
                    <th>FG%</th>
                    <th>FT%</th>
                    <th>PTS</th>
                    <th>REB</th>
                    <th>AST</th>
                    <th>ST</th>
                    <th>BLK</th>
                    <th>TO</th>
                    </thead>
                    <tbody>
                    @foreach($teamPlayers as $teamPlayer)
                    @foreach($teams as $team)
                        @foreach($players as $player)
                                @if(($teamPlayer == $team->player_id) && ($player->id == $team->player_id) && ($player->id == $teamPlayer))
                    <tr>
                        {{--Home team--}}
                    <td>{{$player->first_name . " " . $player->last_name }}</td>
                    <td>{{$player->field_goal}}</td>
                    <td>{{$player->free_throws}}</td>
                    <td>{{$player->points}}</td>
                    <td>{{$player->rebounds}}</td>
                    <td>{{$player->assists}}</td>
                    <td>{{$player->steals}}</td>
                    <td>{{$player->blocks}}</td>
                    <td>{{$player->turnovers}}</td>
                        {{--Away team--}}
                    <td>{{$player->first_name . " " . $player->last_name }}</td>
                    <td>{{$player->field_goal}}</td>
                    <td>{{$player->free_throws}}</td>
                    <td>{{$player->points}}</td>
                    <td>{{$player->rebounds}}</td>
                    <td>{{$player->assists}}</td>
                    <td>{{$player->steals}}</td>
                    <td>{{$player->blocks}}</td>
                    <td>{{$player->turnovers}}</td>
                    </tr>
                    @endif
                        @endforeach
                        @endforeach
                        @endforeach
                    </tbody>
                </table>
            </tr>
            <tr>

            </tr>
            </tbody>
        </table>
        <input type="hidden" value="{{Auth::User()->id}}" name="user_id">

    </div>

@endsection