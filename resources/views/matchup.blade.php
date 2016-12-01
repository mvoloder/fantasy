@extends('layouts.app')

@section('content')


    <table width="100%" border=0>
        <tr>
            {{--LEFT SIDE--}}
            <td align="center">
                {{--<form class="form-horizontal" role="form" method="get">--}}
                {{--@foreach($tm_settings as $tm_setting)--}}
                    {{----}}
                    {{--{{$tm_setting}} <br>--}}
                    {{--@endforeach--}}
                {{--</form>--}}
            </td>
            <td class="divider">

            </td>

            {{--RIGHT SIDE--}}
            <td align="center">
                {{--<form class="form-horizontal" role="form" method="get">--}}
                {{--@foreach($tm_settings as $tm_setting)--}}
                    {{--{{$tm_setting}} <br>--}}
                {{--@endforeach--}}
                {{--</form>--}}
            </td>
        </tr>
    </table>

@endsection