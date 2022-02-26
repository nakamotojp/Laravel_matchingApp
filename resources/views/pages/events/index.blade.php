@extends('layouts.app')

@section('content')
<p style="text-decoration: underline">Events</p>
    <div class="events row">

        <div class="choice border">
            <a href="{{ route('events.list') }}">recent posts</a>
        </div>
        <div class="choice border">
            <a href="">search</a>
        </div>
        <div class="choice border">
            <a href="">popular</a>
        </div>
        <div class="choice border">
            <a href="{{ route('events.hold')}}">Let's hold</a>
        </div>
        <div class="choice border">
            <a href="">reserved</a>
        </div>
        <div class="choice border">
            <a href="">liked</a>
        </div>
        <div class="choice border">
            <a href="">attended</a>
        </div>

    </div>

@endsection
