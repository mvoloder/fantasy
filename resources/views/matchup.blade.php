@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="col-md-6 col-offset-3">
            <button class="btn btn-primary" type="button">simulate</button>
        </div>
    </div>
    <hr>
    @foreach($matchups as $matchup)
        @if(($matchup->week == $round) && ($matchup->match == $match))
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
                                    <td></td>
                                    <td>143</td>
                                    <td>37</td>
                                    <td>28</td>
                                    <td>15</td>
                                    <td>9</td>
                                    <td>17</td>
                                    <td>7</td>
                                    <td>2</td>
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
                                {{--@endforeach--}}
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

                    <div class="container">
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
                                </thead>
                                <tbody>
                                @foreach($players as $player)
                                @foreach($teams as $team)
                                    @if(($team->user_id == $matchup->home_user_id) && ($team->player_id == $player->id))
                                        <tr>
                                            {{--Home team--}}

                                            <td>{{$player->first_name . " " . $player->last_name}}</td>
                                            <td>{{$matchup->h_fg}}</td>
                                            <td>{{$matchup->h_ft}}</td>
                                            <td>{{$matchup->h_pts}}</td>
                                            <td>{{$matchup->h_reb}}</td>
                                            <td>{{$matchup->h_ast}}</td>
                                            <td>{{$matchup->h_st}}</td>
                                            <td>{{$matchup->h_blk}}</td>
                                            <td>{{$matchup->h_to}}</td>
                                        </tr>
                                    @endif
                                @endforeach
                                    @endforeach
                                </tbody>
                            </table>
                        </tr>
                        <tr>

                        </tr>
                        </tbody>
                    </div>

                    <div class="container">
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
                                </thead>
                                <tbody>
                                 @foreach($players as $player)
                                @foreach($teams as $team)
                                    @if(($team->user_id == $matchup->away_user_id) && ($team->player_id == $player->id))
                                        <tr>
                                            {{--Away team--}}

                                            <td>{{$player->first_name . " " . $player->last_name}}</td>
                                            <td>{{$matchup->a_fg}}</td>
                                            <td>{{$matchup->a_ft}}</td>
                                            <td>{{$matchup->a_pts}}</td>
                                            <td>{{$matchup->a_reb}}</td>
                                            <td>{{$matchup->a_ast}}</td>
                                            <td>{{$matchup->a_st}}</td>
                                            <td>{{$matchup->a_blk}}</td>
                                            <td>{{$matchup->a_to}}</td>
                                        </tr>
                                    @endif
                                    @endforeach
                                @endforeach
                                </tbody>
                            </table>
                        </tr>
                        <tr>
                        </tr>
                        </tbody>
                    </div>
                </table>
                <input type="hidden" value="{{Auth::User()->id}}" name="user_id">
            </div>
        @endif
    @endforeach
@endsection