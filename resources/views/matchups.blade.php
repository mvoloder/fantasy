@extends('league')

@section('content')


    <table width="100%" border=0>
        <tr>
            {{--LEFT SIDE--}}
            <td align="center">
                <a href="#week" class="btn btn-info" data-toggle="collapse">Weeks</a> <br>
                <div id="week" class="collapse">
                    @for($i = 0; $i < $smthn; $i++)
                        {{$i + 1}} <br>
                        @foreach($rounds[$i] as $round)
                            <a href="matchup/{{$i+1}}/{{$round}}">{{$round}}</a><br>
                        @endforeach
                    @endfor
                </div>
            </td>
            <td class="divider">

            </td>

            {{--RIGHT SIDE--}}
            <td align="center">

            </td>
        </tr>
    </table>

@endsection