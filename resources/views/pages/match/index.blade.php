@extends('layouts.app')

@section('content')
<div class="p-match-index">
    <p>***Click the icon to see their profiles***</p>
    <div class="row">
        @foreach ($matchedUsers as $value)
        <div class="col-md-12 mb-3 border-bottom" style="padding-bottom: 15px;">
            <a href="{{ route('matches.user', $value->toUser->id)}}"><img src="{{ $value->toUser->img_url }}" class="rounded-circle"
            style="height:70px; width:70px; objected-fit:cover; margin-left:10px; margin-right:30px;"></a>
            <a href="{{ route('matches.chat')}}" class="streched-link ml-3">
                chat with  {{ $value->toUser->name }}
        </div>
        @endforeach
@endsection
