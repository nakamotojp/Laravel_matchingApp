@extends('layouts.app')

@section('content')
<p style="text-decoration: underline">event lists</p>
    <div class="events row">

        @foreach ($lists as $list)
            <div class="eventList d-flex">

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

@endsection
