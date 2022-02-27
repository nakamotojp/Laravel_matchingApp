@extends('layouts.app')

@section('content')

<p style="text-decoration: underline">event detail</p>
<div class="row">
    <div class="col-md-10 col-md-offset-2 mx-auto" style="overflow: scroll;
    scroll-behavior: smooth; height:600px">

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
                <p>count/{{ $event->number }}</p>
            </div>
            <p style="margin-bottom: 0%; text-decoration: underline;">introduce</p>
            <p style="margin-top: 10px; border-bottom: thick double #32a1ce;">{{ $event->introduce }}</p>
                <div class="mt-5" style="float: right">
                    <a class="btn btn-outline-primary" href="">Apply</a>
                </div>
    </div>
</div>
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
