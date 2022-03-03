@extends('layouts.app')

@section('content')
@if(isset($notices))
<p style="text-decoration: underline">notice lists</p>
<div class="notices row">
    <div>
        @foreach ($notices as $notice)
            <div class="noticeList">
                <div class="d-flex">
                    <div class="noticeicon d-flex align-items-center justify-content-center">
                        @if($notice->check == 0)
                        <i class="far fa-envelope fa-2x" style="color:burlywood;"></i>
                        @else
                        <i class="far fa-envelope-open fa-2x" style="color:cadetblue;"></i>
                        @endif
                    </div>
                    <div class="noticemessage d-flex align-items-center justify-content-center">
                        <i>{{ $notice->message }}</i>
                    </div>
                    <div class="noticeopn d-flex align-items-center justify-content-center">
                        <a href="{{ route('users.noticeDetail',$notice->id)}}">check</a></div>
                </div>
                <div style="font-size:2px;width:365px;text-align: right;"><i>{{ $notice->created_at }}</i></div>
            </div>
        @endforeach

    </div>
</div>
@else
<div class="d-flex align-items-center justify-content-center" style="height:500px;">
    <p class="text-center">there is no notice</p>
  </div>
@endif
@endsection
