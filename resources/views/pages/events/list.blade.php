@extends('layouts.app')

@section('content')
<p style="text-decoration: underline">event lists</p>
    <div class="events row">

        @foreach ($lists as $list)
            <div class="eventList d-flex" style="width:385px;">

                <div class="eventimg">
                    @if($list->likes()->exists())
                    <p style="margin-bottom: 0px; color:rgb(70, 156, 226);"><i class="fas fa-heart"></i>  {{ $list->likes()->count()}}</p>
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
                        <a type="button" class="btn btn btn-light" style="font-size: 5px;"
                        href="{{ route('events.detail', $list->id)}}">details</a>
                    </div>
                </div>
            </div>
        @endforeach

    </div>

@endsection
