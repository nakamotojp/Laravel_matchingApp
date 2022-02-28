@extends('layouts.app')

@section('content')
<p style="text-decoration: underline">Events</p>
    <div class="events row">

        <div class="choice border d-flex align-items-center justify-content-center">
            <a href="{{ route('events.list') }}">recent posts</a>
        </div>
        <div class="choice border d-flex align-items-center justify-content-center">
            <a href="">search</a>
        </div>
        <div class="choice border d-flex align-items-center justify-content-center">
            <a href="">popular</a>
        </div>
        <div class="choice border d-flex align-items-center justify-content-center">
            <a href="{{ route('events.hold')}}">Let's hold</a>
        </div>
        <div class="choice border d-flex align-items-center justify-content-center">
            <a href="">you holding & held</a>
        </div>
        <div class="choice border d-flex align-items-center justify-content-center">
            <a href="{{ route('events.reserved')}}">reserved</a>
        </div>
        <div class="choice border d-flex align-items-center justify-content-center">
            <a href="{{ route('events.liked')}}">liked</a>
        </div>
        <div class="choice border d-flex align-items-center justify-content-center">
            <a href="">attended</a>
        </div>

    </div>

@endsection
