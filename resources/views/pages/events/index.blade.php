@extends('layouts.app')

@section('content')
<p style="text-decoration: underline">Events</p>
    <div class="events row">

        <div class="choice border d-flex align-items-center justify-content-center">
            <a href="{{ route('events.list') }}">recent posts</a>
        </div>
        <div class="choice border d-flex align-items-center justify-content-center">
            <a href="{{ route('events.showSearch')}}">search</a>
        </div>
        <div class="choice border d-flex align-items-center justify-content-center">
            <a href="{{ route('events.hold')}}">Let's hold</a>
        </div>
        <div class="choice border d-flex align-items-center justify-content-center">
            <a href="{{ route('events.held')}}">you holding & held</a>
        </div>
        <div class="choice border d-flex align-items-center justify-content-center">
            <a href="{{ route('events.reserved')}}">reserved</a>
        </div>
        <div class="choice border d-flex align-items-center justify-content-center">
            <a href="{{ route('events.liked')}}">liked</a>
        </div>
        <div class="choice border d-flex align-items-center justify-content-center">
            <a href="{{ route('test.batch')}}">attended</a>
        </div>

    </div>

@endsection
