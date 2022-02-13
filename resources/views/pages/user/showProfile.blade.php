@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-10 col-md-offset-2 mx-auto">
        <h2>profile</h2>
        <div class="col">
            <p>age {{ $profile->age }}</p>
        </div">
        <div class="col">
            <p>$income/year {{ $profile->income }}</p>
        </div">
        <h4>introduce</h4>
        <p>{{ $profile->introduce }}</p>




            <div class="mt-5">
                <a class="btn btn-outline-primary" href="{{ route('users.editProfile')}}">
                    edit</a>
            </div>

    </div>
</div>
@endsection
