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
        <input id="message" name="message" type="text" value="" size="37" style="height:33px; font-size:1.1em;"/>

        <input type="button" value="send" id="send">
    </form><!-- .chat -->
<script
  src="https://code.jquery.com/jquery-3.6.0.min.js"
  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
  crossorigin="anonymous"></script>
<script>
    // $("#send").on("click", function () {
    //     alert('aaa');
    // });
$(function() {

    $("#send").on("click", function () {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'post',
            url: '/chat',
            dataType: 'json',
            data: {
                'to_user_id' : $("#to_user_id").val(),
                'message' : $("#message").val()
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },

        }).done(function (data) {
            console.log('success');
            let html = '';

            $.each(data, function (index, value) { //dataの中身からvalueを取り出す

                let id = value.from_user_id;
                let chat = value.chat;
// １ユーザー情報のビューテンプレートを作成
                html = `
                <div class="message d-flex flex-row-reverse align-items-start mb-4">

                    <!-- .message-icon -->
                        <p class="message-text p-2 me-2 mb-0 bg-info" style="border-radius:24px;">
                            ${chat}
                        </p><!-- .message-text -->
                </div>

                                `
                            });
            $('.chat').append(html);
            $('.chat').scrollTop( $(".chat")[0].scrollHeight );
            $("#message").val("");
// 検索結果がなかったときの処理
            if (data.length === 0) {
                $('.user-index-wrapper').after('<p class="text-center mt-5 search-null">ユーザーが見つかりません</p>');
            }

        }).fail(function(msg) {
            console.log('Ajax Err');
        });
  });
});
  </script>

@endsection
