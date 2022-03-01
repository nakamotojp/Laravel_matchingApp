@extends('layouts.app')

@section('content')


<p style="text-decoration: underline">event detail</p>
<div class="row">
    <div class="col-md-10 col-md-offset-2 mx-auto" style="overflow: scroll;
    scroll-behavior: smooth; height:600px">

    @if($event->likes()->where('event_id',$event->id)->exists())
    <a id='like' href="" data-event_id={{ $event->id }}><i class="fas fa-heart fa-2x" style="color:rgb(70, 156, 226);"></i>&emsp;{{ $event->likes_count }}</a>
    @else
    <p id='like' href="" data-event_id={{ $event->id }}><i class="far fa-heart fa-2x"></i>&emsp;{{ $event->likes_count }}</a>
    @endif
            <h2>{{ $event->name }}</h2>
            <div class="col">
                <img src="{{ $event->img_url }}"
                style="height:300px; width:300px; objected-fit:cover; margin-right:15px;">
            </div>
            <div class="col" style="margin-top: 10px; border-bottom: thick double #32a1ce;">
                <p>{{ $event->title }}</p>
            </div>
            <div class="col" style="margin-top: 10px; border-bottom: thick double #32a1ce;">
                <p style="margin-bottom: 0%; text-decoration: underline;">address</p>
                <p>{{ $event->address }}</p>
                <div id="map" class="google-map d-flex align-items-center">#Failed to load on google map because the address is incorrect.</div>
            </div>
            <div class="col" style="margin-top: 10px; border-bottom: thick double #32a1ce;">
                <p style="margin-bottom: 0%; text-decoration: underline;">datetime</p>
                <p>{{ $event->datetime }}</p>
                <p>{{ $event->hour }}</p>
            </div>
            <div class="col" style="margin-top: 10px; border-bottom: thick double #32a1ce;">
                <p style="margin-bottom: 0%; text-decoration: underline;">recruitment numbers</p>
                <p>{{ $event->number }}</p>
                <p>** {{ $event->reserves_count }} people have a reservation now.</p>
            </div>
            <p style="margin-bottom: 0%; text-decoration: underline;">introduce</p>
            <p style="margin-top: 10px; border-bottom: thick double #32a1ce;">{{ $event->introduce }}</p>
                <div class="mt-5" style="float: right">
                    <a class="btn btn-outline-primary" href="">Apply</a>
                </div>
    </div>
</div>

<script>
$(function() {

$('#like').on('click', function () {

    event_id = $(this).data("event_id");
    console.log(event_id);

    $.ajax({
            type: 'post',
            url: '/events/like',
            dataType: 'json',
            data: {
                'event_id' : event_id
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
        }).done(function (data) //コントローラーからのリターンされた値をdataとして指定
            {
                // if ( data == 1 )
                // {
                    console.log('ok');
                    //クリックしたタグのステータスを変更
                    // click_button.attr("like_product", "1");
                    // //クリックしたタグの子の要素を変更(表示されているハートの模様を書き換える)
                    // click_button.children().attr("class", "fas fa-heart");
                // }
                // if ( data == 0 )
                // {
                    //クリックしたタグのステータスを変更
                    // click_button.attr("like_product", "0");
                    // //クリックしたタグの子の要素を変更(表示されているハートの模様を書き換える)
                    // click_button.children().attr("class", "far fa-heart");
                // }
            }).fail(function (data)
            {
                console.log('ng');

            });

        });
});
</script>
<script>
function initMap() {

            var target = document.getElementById('map'); //マップを表示する要素を指定
            var address = '{{$event->address}}';
            var geocoder = new google.maps.Geocoder();

        geocoder.geocode({ address: address }, function(results, status){

            if (status === 'OK' && results[0]){
                console.log(results[0].geometry.location);
                var map = new google.maps.Map(target, {
                center: results[0].geometry.location,
                zoom: 13
                });
                var marker = new google.maps.Marker({
                position: results[0].geometry.location,
                map: map,
                animation: google.maps.Animation.DROP
                });
            }
        });
}
</script>

<script async
src="https://maps.googleapis.com/maps/api/js?language=en&key=AIzaSyASJ1dvPGSp-_opvrXNZLNKBmpZiC6bswo&callback=initMap">
</script>

@endsection
