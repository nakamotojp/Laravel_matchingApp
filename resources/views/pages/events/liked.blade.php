@extends('layouts.app')

@section('content')
@if(isset($liked))
<p style="text-decoration: underline">liked lists</p>
    <div class="events" style="padding-left: 0px">
        @foreach ($liked as $list)
            <div class="eventList d-flex" style="width:375px;">

                <div class="eventimg">
                    <p style="margin-bottom: 0px;"><i class="far fa-heart"></i>  count</p>
                <img src="{{ $list->img_url }}">
                </div>
                <div class="eventinfo">
                    <p style="font-size:15px;">{{ $list->name }}</p>
                    <div style="width:230px;text-align: center;">
                        <p style="font-size:11px;">{{ $list->title }}</p>
                    </div>
                    <div style="width:230px;text-align: right;">
                        <a type="button" class="btn btn btn-light" style="font-size: 5px;"
                        href="{{ route('events.detail', $list->id)}}">details</a>
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
