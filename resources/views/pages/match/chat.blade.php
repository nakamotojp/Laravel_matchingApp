@extends('layouts.app')

@section('content')
<p style="text-decoration: underline">{{ $user->name }}</p>
    <div class="chat bg-light p-2" style="overflow: scroll; scroll-behavior: smooth; height:565px;">

        @foreach($chats as $chat)
            @if ($chat['from_user_id'] == $user->id)
                <div class="message d-flex flex-row align-items-start mb-4">
                    <div class="message-icon fs-3">
                        <img src="{{ $user->img_url }}" title="tphoto" alt="Tinder Photo"
                        style="width:40px; height:40px; object-fit:cover; border-radius: 50%;"/>
                    </div>
                        <p class="message-text p-2 ms-2 mb-0 bg-warning" style="border-radius:24px;">
                            {{ $chat['chat'] }}
                        </p>
                </div>
            @else
                <div class="message d-flex flex-row-reverse align-items-start mb-4">
                        <p class="message-text p-2 me-2 mb-0 bg-info" style="border-radius:24px;">
                            {{ $chat['chat'] }}
                        </p>
                </div>
            @endif
        @endforeach


    </div>
    <form method="post" action="{{ route('chat') }}">
        @csrf
        <input id="to_user_id" name="to_user_id" type="hidden" value="{{ $user->id }}"/>
        <input id="message" name="message" type="text" value="" size="35" style="height:33px; font-size:1.1em;"/>

        <input type="button" value="send" id="send">
    </form><!-- .chat -->


  </script>

@endsection
