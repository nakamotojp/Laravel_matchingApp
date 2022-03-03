@extends('layouts.app')

@section('content')
@if(!empty($reserved))
<p style="text-decoration: underline">reserved lists</p>

    <div class="events" style="padding-left: 0px">
        @foreach ($reserved as $list)
            <div class="eventList d-flex" style="width:375px;">

                <div class="eventimg">
                    @if($list->likeJudge($list->id) == 1)
                    <p style="margin-bottom: 0px; color:rgb(70, 156, 226);"><i class="fas fa-heart"></i>  {{ $list->likes()->count()}}</p>
                    @elseif($list->likeJudge($list->id) == 2)
                    <p style="margin-bottom: 0px; color:rgb(70, 156, 226);"><i class="far fa-heart"></i>  {{ $list->likes()->count()}}</p>
                    @else
                    <p style="margin-bottom: 0px;"><i class="far fa-heart"></i>  no like</p>
                    @endif
                <img src="{{ $list->img_url }}">
                </div>
                <div class="eventinfo">
                    <p style="font-size:15px;">{{ $list->name }}</p>
                    <div style="width:230px;text-align: center;">
                        <p style="font-size:11px;">{{ $list->title }}</p>
                    </div>
                    <div style="width:230px;text-align: right;">
                        @if($list->reserveJudge($list->id) == 3)
                        <button type="button" class="btn btn-outline-info" disabled style="font-size: 5px;">already canceled</button>
                        @else
                        <a type="button" class="btn btn-outline-info" style="font-size: 5px;"
                        href="{{ route('events.detail', $list->id)}}">details</a>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach

    </div>
@else
<div class="d-flex align-items-center justify-content-center" style="height:500px;">
    <p class="text-center">there is no data</p>
  </div>
@endif
@endsection
