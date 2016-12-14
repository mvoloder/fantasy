@extends('layouts.app')

@section('content')


    <div class="container">
        <div class="col-md-8 col-offset-4">
            @foreach($weeks as $week)
                @if($week->id == $round)
                    @for($i = 0; $i < ($week->games); $i++)
                        <button class="btn btn-primary" type="button" id="gameId">Simulate game {{$i + 1}}</button>
                    @endfor
                @endif
            @endforeach
        </div>
    </div>
    <hr>
    @foreach($matchups as $matchup)
        @if(($matchup->week == $round) && ($matchup->match == $match))
            <div class="container">
                <table class="table table-hover">
                    <thead>
                    @foreach($t_setts as $t_sett)
                        @if($matchup->home_user_id ==$t_sett->user_id)
                            <tr>
                                <th><h2>{{$t_sett->team_name}}</h2></th>
                                @elseif($matchup->away_user_id == $t_sett->user_id )
                                    <th><h2>{{$t_sett->team_name}}</h2></th>
                            </tr>
                        @endif
                    @endforeach
                    </thead>
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
                                @foreach($t_setts as $t_sett)
                                    @foreach($teams as $team)
                                        @if(($team->user_id == $matchup->home_user_id) && ($t_sett->user_id == $matchup->home_user_id))
                                            <tr>
                                                <td>{{$t_sett->team_name}}</td>
                                                <td>{{$matchup->h_fg}}</td>
                                                <td>{{$matchup->h_ft}}</td>
                                                <td>{{$matchup->h_pts}}</td>
                                                <td>{{$matchup->h_reb}}</td>
                                                <td>{{$matchup->h_ast}}</td>
                                                <td>{{$matchup->h_st}}</td>
                                                <td>{{$matchup->h_blk}}</td>
                                                <td>{{$matchup->h_to}}</td>
                                                <td>{{$matchup->home_score}}</td>@break
                                            </tr>
                                        @endif
                                    @endforeach
                                @endforeach
                                @foreach($t_setts as $t_sett)
                                    @foreach($teams as $team)
                                        @if(($team->user_id == $matchup->away_user_id) && ($matchup->away_user_id == $t_sett->user_id))
                                            <tr>
                                                <td>{{$t_sett->team_name}}</td>
                                                <td>{{$matchup->a_fg}}</td>
                                                <td>{{$matchup->a_ft}}</td>
                                                <td>{{$matchup->a_pts}}</td>
                                                <td>{{$matchup->a_reb}}</td>
                                                <td>{{$matchup->a_ast}}</td>
                                                <td>{{$matchup->a_st}}</td>
                                                <td>{{$matchup->a_blk}}</td>
                                                <td>{{$matchup->a_to}}</td>
                                                <td>{{$matchup->away_score}}</td>@break
                                            </tr>
                                        @endif
                                    @endforeach
                                @endforeach
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