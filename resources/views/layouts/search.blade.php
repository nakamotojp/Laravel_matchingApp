@extends('layouts.app')
@section('content')

<form method="POST" action="{{ route('events.search') }}">
    @csrf

    @if(!empty(session('like')))
    <input id="hidden" type="hidden" name="like" value="1">
    @endif
    @if(!empty(session('date')))
    <input id="hidden2" type="hidden" name="date" value="1">
    @endif
    @if(!empty(session('sexual')))
    <input id="hidden3" type="hidden" name="sexual" value="1">
    @endif
    @if(!empty(session('party')))
    <input id="hidden4" type="hidden" name="party" value="1">
    @endif
    @if(!empty(session('outdoor')))
    <input id="hidden5" type="hidden" name="outdoor" value="1">
    @endif
    @if(!empty(session('online')))
    <input id="hidden6" type="hidden" name="online" value="1">
    @endif

<div class="search" style="width:377px; padding:7px; background-color:#D8BfD8">

    <div class="popular">
        <button type="button" id="searchpart" class="btn btn-light {{ empty(session('like')) ? '' : session('like')}}" style="color:dimgrey;"><i class="fas fa-heart">&ensp;</i>
            In descending order of likes</button>
    </div>

    <div class="eventtye d-flex" style="margin-top:7px; margin-bottom:7px;">
        <button id="searchpart2" type="button" class="btn btn-light {{ empty(session('date')) ? '' : session('date')}}" style="color:dimgrey; margin-right:5px;">date</button>
        <button id="searchpart3" type="button" class="btn btn-light {{ empty(session('sexual')) ? '' : session('sexual')}}" style="color:dimgrey; margin-right:5px;">sexual</button>
        <button id="searchpart4" type="button" class="btn btn-light {{ empty(session('party')) ? '' : session('party')}}" style="color:dimgrey; margin-right:5px;">party</button>
        <button id="searchpart5" type="button" class="btn btn-light {{ empty(session('outdoor')) ? '' : session('outdoor')}}" style="color:dimgrey; margin-right:5px;">outdoor</button>
        <button id="searchpart6" type="button" class="btn btn-light {{ empty(session('online')) ? '' : session('online')}}" style="color:dimgrey; margin-right:2px;">online</button>
    </div>

    <div class="input-group">
        <input type="text" class="form-control" placeholder="keyword or nothing" name="keyword" value="{{ empty(session('keyword')) ? '' : session('keyword')}}">
        <span class="input-group-btn">
          <button class="btn btn-default" type="submit" style="margin-left:8px;background-color:#F8F8FF">
            <i style="width:20px; height:20px;" class="fas fa-search" aria-hidden="true"></i>
          </button>
        </span>
    </div>
</div>
</form>

    <script>
$('#searchpart').on('click', function(){
  $(this).toggleClass('isActive');

  if($("#hidden").length){
      console.log('ok');
    $("#hidden").remove();
  }else{
    html = `<input id="hidden" type="hidden" name="like" value="1"> `;
    $('#searchpart').append(html);
  }

})

$('#searchpart2').on('click', function(){
  $(this).toggleClass('isActive');

  if($("#hidden2").length){
      console.log('ok');
    $("#hidden2").remove();
  }else{
    html = `<input id="hidden2" type="hidden" name="date" value="1"> `;
    $('#searchpart').append(html);
  }
})

$('#searchpart3').on('click', function(){
  $(this).toggleClass('isActive');

    if($("#hidden3").length){
    $("#hidden3").remove();
  }else{
    html = `<input id="hidden3" type="hidden" name="sexual" value="1"> `;
    $('#searchpart').append(html);
  }
})

$('#searchpart4').on('click', function(){
  $(this).toggleClass('isActive');

    if($("#hidden4").length){
    $("#hidden4").remove();
  }else{
    html = `<input id="hidden4" type="hidden" name="party" value="1"> `;
    $('#searchpart').append(html);
  }
})

$('#searchpart5').on('click', function(){
  $(this).toggleClass('isActive');

    if($("#hidden5").length){
    $("#hidden5").remove();
  }else{
    html = `<input id="hidden5" type="hidden" name="outdoor" value="1"> `;
    $('#searchpart').append(html);
  }
})

$('#searchpart6').on('click', function(){
  $(this).toggleClass('isActive');

  if($("#hidden6").length){
    $("#hidden6").remove();
  }else{
    html = `<input id="hidden6" type="hidden" name="online" value="1"> `;
    $('#searchpart').append(html);
  }
})

</script>

@yield('search')
@endsection
