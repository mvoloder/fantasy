@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Edit your team info</div>

                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="/nba/team">
                            {{csrf_field()}}

                            <div class="form-group{{$errors->has('team_name') ? 'has-error' : ''}}">
                                <label for="team_name" class="col-md-4 control-label">Team name</label>

                                <div class="col-md-6">
                                    <input id="team_name" type="text" class="form-control" name="team_name" required>

                                    @if($errors->has('team_name'))
                                        <span class="help-block">
                                            <strong>{{$errors->first('team_name')}}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>


                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Create Team
                                    </button>
                                </div>
                            </div>
                            <input type="hidden" value="{{Auth::User()->id}}" name="user_id">
                            <input type="hidden" name="league_id" value="{{$leagueId}}">

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
