@extends('layouts.app')

@section('content')
<div class="row" style="height:600px; overflow: scroll;">
        <p style="text-decoration: underline">hold event!</p>
        <form enctype="multipart/form-data" method="POST" action="{{ route('events.post') }}">
          @csrf

            <div class="form-group" id="eventform" style="margin-top:10px;">
                <label for="age">event name.</label>
                <input id="title" name="name" class="form-control" value="{{ old('name') }}" type="text">
            </div>

            <div class="form-group" id="eventform">
                <label for="title">title.</label>
                <input id="title" name="title" class="form-control" value="" type="text">
            </div>

            <div class="form-group" id="eventform">
                <label for="title">address.</label>
                <input id="title" name="address" class="form-control" value="{{ old('address') }}" type="text">
            </div>

            <div class="form-group" id="eventform">
                <label for="age">photo.</label>
                <input id="image" type="file" name="image" class="form-control" required autocomplete="image" autofocus>
            </div>

            <p>date & start time.</p>
            <div class="form-group" id="eventform">
                <input name="datetime" type="datetime-local">
            </div>

            <div class="form-group" id="eventform">
                <label for="title">about time required etc.</label>
                <input id="title" name="hour" class="form-control" value="{{ old('hour') }}" type="text">
            </div>


            <div class="selectdiv" id="eventform" style="margin-right:20px;">
                <label>
                    <select name="number">
                        <option selected>number of people.</option>
                        <option value="0">undecided</option>
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

            <div class="selectdiv" style="margin-bottom: 24px;">
                <label>
                    <select name="type">
                        <option selected>event type.</option>
                        <option value="0">undecided</option>
                        <option value="1">date</option>
                        <option value="2">go out drinking</option>
                        <option value="3">sexual</option>
                        <option value="4">party</option>
                        <option value="5">outdoor</option>
                        <option value="6">trip with</option>
                        <option value="7">online</option>
                        <option value="9"></option>
                        <option value="10"></option>
                    </select>
                </label>
            </div>


            <div class="form-group" id="eventform">
                <label for="content">content.</label>
                <textarea type="text" name="content" class="form-control" rows="8" value="{{ old('content') }}"></textarea>
            </div>

            <div class="mt-3" style="float: right">
                <button type="submit" class="btn btn-outline-primary" style="margin-right:0px;">post.</button>
            </div>

        </form>
</div>

@endsection
