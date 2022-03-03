@extends('layouts.app')

@section('content')
<div class="row">

    <div class="col-md-10 col-md-offset-2 mx-auto">
    @if($exists)
        <h2>{{ $user->name }}</h2>

        <div class="col">
            <img src="{{ $user->img_url }}"
            style="height:300px; width:300px; objected-fit:cover; margin-right:15px;">
        </div>
        <div class="col">
            <p>age:  {{ $matchedUser->age }}</p>
        </div>
        <div class="col">
            <p>$income/year:  {{ $matchedUser->income }}</p>
        </div>
        <h5>introduce:</h5>
        <p>{{ $matchedUser->introduce }}</p>
            {{-- <div class="mt-5">
                <a class="btn btn-outline-primary" href="{{ route('matches.chat')}}">
                    chat</a>
            </div> --}}
    @else
    <h2>{{ $user->name }}</h2>

        <div class="col">
            <img src="{{ $user->img_url }}"
            style="height:300px; width:300px; objected-fit:cover; margin-right:15px;">
        </div>
        <div class="col">
            <p>***No self-introduction***</p>
        </div>
        {{-- <div class="mt-5">
            <a class="btn btn-outline-primary" href="{{ route('matches.index') }}">
                back</a>
        </div> --}}


    @endif
    </div>

</div>
@endsection
