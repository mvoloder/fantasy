@extends('layouts.app')

@section('content')


    <table width="100%" border=0>
        <tr>
            {{--LEFT SIDE--}}
            <td align="center">
                @for($i = 0; $i < $smthn; $i++)
                    {{$i +1}} <br>
                    @foreach($rounds[$i] as $round)
                        <a href="#">{{$round}}</a><br>
                    @endforeach
                @endfor
            </td>
            <td class="divider">

            </td>
            {{--RIGHT SIDE--}}
            <td align="center">

            </td>
        </tr>
    </table>

@endsection