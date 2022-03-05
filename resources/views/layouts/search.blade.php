@extends('layouts.app')
@section('content')

<div class="search" style="width:373px; padding:7px; background-color:#D8BfD8">

    <div class="popular" style="margin-bottom:7px;">
        <button type="button" class="btn btn-light" style="color:dimgrey;"><i class="far fa-grin-squint-tears"></i>&ensp;Popular event</button>
    </div>

    <div class="input-group">
        <input type="text" class="form-control" placeholder="keyword">
        <span class="input-group-btn">
          <button class="btn btn-default" type="submit" style="margin-left:8px;background-color:#F8F8FF">
            <i style="width:20px; height:20px;" class="fas fa-search" aria-hidden="true"></i>
          </button>
        </span>
    </div>

    <div class="eventtye d-flex" style="margin-top:7px;">
        <a href="" type="button" class="btn btn-light" style="color:dimgrey; margin-right:2px;">fa</a>
        <a href="" type="button" class="btn btn-light" style="color:dimgrey; margin-right:2px;">fa</a>
        <a href="" type="button" class="btn btn-light" style="color:dimgrey; margin-right:2px;">fa</a>
        <a href="" type="button" class="btn btn-light" style="color:dimgrey; margin-right:2px;">fa</a>
        <a href="" type="button" class="btn btn-light" style="color:dimgrey; margin-right:2px;">fa</a>
        <a href="" type="button" class="btn btn-light" style="color:dimgrey; margin-right:2px;">fa</a>
        <a href="" type="button" class="btn btn-light" style="color:dimgrey; margin-right:2px;">fa</a>
        <a href="" type="button" class="btn btn-light" style="color:dimgrey; margin-right:2px;">fa</a>
        <a href="" type="button" class="btn btn-light" style="color:dimgrey; margin-right:2px;">fa</a>


    </div>


</div>

</div>

@yield('search')
@endsection
