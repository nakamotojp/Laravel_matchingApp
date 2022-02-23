@extends('layouts.app')

@section('content')
<div class="row">
        <p style="text-decoration: underline">hold event!</p>
        <form enctype="multipart/form-data" method="POST" action="{{ route('events.post') }}">
          @csrf

            <div class="form-group">
                <label for="age">event name</label>
                <input id="title" name="name" class="form-control" value="{{ old('name') }}" type="text">
            </div>

            <div class="form-group">
                <label for="title">title</label>
                <input id="title" name="title" class="form-control" value="" type="text">
            </div>

            <div class="form-group">
                <label for="title">address</label>
                <input id="title" name="address" class="form-control" value="{{ old('address') }}" type="text">
            </div>

            <div class="form-group">
                <label for="age">photo</label>
                <input id="image" type="file" class="form-control">
            </div>

            <div class="selectdiv" style="margin-right:20px;">
                <label>
                    <select>
                        <option selected>number of people</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10 or more</option>
                    </select>
                </label>
            </div>

            <div class="selectdiv">
                <label>
                    <select>
                        <option selected>event type</option>
                        <option value="1">date</option>
                        <option value="2">go out drinking</option>
                        <option value="3">sexual</option>
                        <option value="4">party</option>
                        <option value="5">outdoor</option>
                        <option value="6">trip with</option>
                        <option value="7">online</option>
                        <option value="8"></option>
                        <option value="9"></option>
                        <option value="10"></option>
                    </select>
                </label>
            </div>

            <div class="form-group">
                <label for="content">content</label>
                <textarea type="text" name="content" class="form-control" rows="8" value="{{ old('content') }}"></textarea>
            </div>

            <div class="mt-3">
                <button type="submit" class="btn btn-outline-primary" style="margin-right:0px;">post</button>
            </div>

        </form>
</div>

@endsection
