@extends('layouts.app')

@section('content')
<div class="p-match-index">
    <div class="row">
        @foreach ($machedUsers as $value)
        <div class="col-md-12 mb-3">
            <img src="{{ $value->toUser->img_url }}" class="rounded-circle"
            style="height:70px; width:70px; objected-fit:cover; margin-left:10px; margin-right:15px;">
            <a href="#" class="streched-link" ml-3>
                {{ $value->toUser->name }}
        </div>
        @endforeach
@endsection
