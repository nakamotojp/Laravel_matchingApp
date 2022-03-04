@extends('layouts.app')

@section('content')
<p style="text-decoration: underline">detail notice</p>
<div class="row">
    <div class="col-md-10 col-md-offset-2 mx-auto" style="overflow: scroll;
    scroll-behavior: smooth; height:600px">

            <div class="col" style="margin-top: 10px; border-bottom: thick double #32a1ce;">
                <i class="far fa-envelope"></i> date:<p>{{ $notice->created_at }}</p></div>

            <div class="col" style="margin-top: 10px; border-bottom: thick double #32a1ce;">
                <p>title:</p>
                <p>{{ $notice->message}}</p>
            </div>

            <div class="col" style="margin-top: 10px; border-bottom: thick double #32a1ce;">
                <p>content:</p>
                <p>{{ $notice->content}}</p>
            </div>

            <div class="col" style="margin-top: 10px; border-bottom: thick double #32a1ce;">
                <p>from_user:</p>
                <div class="d-flex align-items-center">
                    <p><img src="{{ $notice->toUser->img_url }}" class="rounded-circle"
                        style="height:85px; width:85px; objected-fit:cover; margin-left:10px; margin-right:30px;"></p>
                    <a href="{{ route('matches.user', $notice->toUser->id)}}" style="margin-left: 20px;">{{ $notice->toUser->name}}</a>
                </div>
            </div>
            @if(isset($notice->event_id))
            <div class="col" style="margin-top: 10px; border-bottom: thick double #32a1ce;">
                <p>event:</p>
                <div class="d-flex align-items-center">
                    <p><img src="{{ $notice->toEvent->img_url }}" class="rounded-circle"
                        style="height:85px; width:85px; objected-fit:cover; margin-left:10px; margin-right:30px;"></p>
                    <a href="{{ route('events.detail', $notice->toEvent->id)}}" style="margin-left: 10px;">{{ $notice->toEvent->name}}</a>
                </div>
            </div>
            @endif
            <div class="col" style="margin-bottom: 50px; padding-top:30px;">
                <p>Do you approve attendance at the event?</p>
                <div class="d-flex align-items-center justify-content-center">
                    <?php $check = $notice->reserveJudge($notice->toEvent->id); ?>
                    @if($check == 1)
                    <a class="btn btn-outline-info" href="{{ route('yesEvent', $notice->id )}}">YES</a>
                    <a class="btn btn-outline-info" href="{{ route('noEvent', $notice->id )}}" style="margin-left:150px;">NO</a>
                    @elseif($check == 2)
                    <button type="button" class="btn btn-outline-info" disabled>already approved</button>
                    @elseif($check == 3)
                    <button type="button" class="btn btn-outline-info" disabled>already canceled</button>
                    @endif
                </div>
            </div>


    </div>
</div>

@endsection
