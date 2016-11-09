@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Create a league</div>

                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="/nba/createleague">
                            {{csrf_field() }}

                            <div class="form-group{{$errors->has('league_name') ? 'has-error' : ''}}">
                                <label for="league_name" class="col-md-4 control-label">League Name</label>

                                <div class="col-md-6">
                                    <input id="league_name" type="text" class="form-control" name="league_name" required>

                                    @if($errors->has('league_name'))
                                        <span class="help-block">
                                            <strong>{{$errors->first('league_name')}}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{$errors->has('league_password') ? 'has-error' : ''}}">
                                <label for="league_password" class="col-md-4 control-label">League Password</label>

                                <div class="col-md-6">
                                    <input id="league_password" type="text" class="form-control" name="league_password" required>

                                    @if($errors->has('league_password'))
                                        <span class="help-block">
                                            <strong>{{$errors->first('league_password')}}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="number_of_teams" class="col-md-4 control-label">Number of teams</label>
                                <select name="number_of_teams" class="selectpicker">
                                    <option>4</option>
                                    <option>6</option>
                                    <option>8</option>
                                    <option>10</option>
                                    <option>12</option>
                                    <option>14</option>
                                    <option>16</option>
                                    <option>18</option>
                                    <option>20</option>
                                </select>
                                @if($errors->has('number_of_teams'))
                                    <span class="help-block">
                                            <strong>{{$errors->first('number_of_teams')}}</strong>
                                        </span>
                                @endif
                            </div>

                            <div class="form-horizontal">
                                <label for="roster_postitions" class="col-md-4 control-label">Select roster
                                    positions</label>

                                <label class="col-xs-pull-2">PG</label>
                                <select class="selectpicker" name="point_guard">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                </select>

                                <label class="col-xs-pull-2">SG</label>
                                <select class="selectpicker" name="shooting_guard">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                </select>

                                <label class="col-xs-pull-2">G</label>
                                <select class="selectpicker" name="guard">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                </select>

                                <label class="col-xs-pull-2">SF</label>
                                <select class="selectpicker" name="small_forward">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                </select>

                                <label class="col-xs-pull-2">F</label>
                                <select class="selectpicker" name="forward">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                </select>

                                <label class="col-xs-pull-2">PF</label>
                                <select class="selectpicker" name="power_forward">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                </select>

                                <label class="col-xs-pull-2">C</label>
                                <select class="selectpicker" name="center">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                </select>

                                <label class="col-xs-pull-2">Utility</label>
                                <select class="selectpicker" name="utility">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                </select>

                                <label class="col-xs-pull-2">Bench</label>
                                <select class="selectpicker" name="bench">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                </select>

                            </div>

                            <div class="form-group">
                                <label for="draft_time" class="col-md-4 control-label">Draft time</label>
                                <select name="draft_time" class="selectpicker">
                                    <option>0:30</option>
                                    <option>0:45</option>
                                    <option>1:00</option>
                                    <option>1:15</option>
                                    <option>1:30</option>
                                </select>
                            </div>

                            <input type="hidden" value="{{Auth::User()->id}}" name="user_id">

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Create League
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