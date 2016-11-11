@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Join league</div>

                    <div class="panel-body">
                        <p>Input your league ID and league PASSWORD</p>

                        <form class="form-horizontal" role="form" method="POST" action="/nba/joinleague">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('league_id') ? 'has-error' : '' }}">
                                <label for="league_id" class="col-md-4 control-label">League ID</label>

                                <div class="col-md-6">
                                    <input id="league_id" type="text" class="form-control" name="league_id"
                                           required>

                                    @if($errors->has('league_id'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('league_id') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('league_password' ? 'has-league_password' : '') }}">
                                <label for="league_password" class="col-md-4 control-label">League Password</label>

                                <div class="col-md-6">
                                    <input id="league_password" type="password" class="form-control"
                                           name="league_password" required>

                                    @if($errors->has('league_password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('league_password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <input type="hidden" value="{{Auth::User()->id}}" name="user_id">

                            <div class="form-group">
                                <div class="col-md-push-8 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Join
                                    </button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection