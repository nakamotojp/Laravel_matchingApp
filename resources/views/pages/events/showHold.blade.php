@extends('layouts.app')

@section('content')
<div class="row" style="height:600px; overflow: scroll;">

        <p style="text-decoration: underline">hold event!</p>
        <form enctype="multipart/form-data" method="POST" action="{{ route('events.post') }}">
          @csrf

            <div class="form-group" id="eventform" style="margin-top:10px;">
                @if ($errors->any())
                <div class="alert alert-danger" style="width:350px;">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            </div>

            <div class="form-group" id="eventform" style="margin-top:10px;">
                <label for="age">event name.</label>
                <input id="title" name="name" class="form-control" value="{{ old('name') }}" type="text">
            </div>

            <div class="form-group" id="eventform">
                <label for="title">title.</label>
                <input id="title" name="title" class="form-control" value="{{ old('title') }}" type="text">
            </div>

            <div class="form-group" id="eventform">
                <label for="title">address.</label>
                <input id="title" name="address" class="form-control" value="{{ old('address') }}" type="text">
            </div>

            <div class="form-group" id="eventform">
                <label for="age">photo.</label>
                <input id="image" type="file" name="image" class="form-control" required autocomplete="image" autofocus>
            </div>

            <p>date</p>
            <div class="form-group" id="eventform">
                <input name="datetime" type="date" value="{{ old('datetime') }}">
            </div>

            <div class="form-group" id="eventform">
                <label for="title">please enter the time etc</label>
                <input id="title" name="hour" class="form-control" value="{{ old('hour') }}" type="text">
            </div>


            <div class="selectdiv" id="eventform" style="margin-right:20px;">
                <label>
                    <select name="number">
                        <option selected>number of people.</option>
                        <option value="0" @if(old('number') === '0') selected @endif>undecided</option>
                        <option value="1" @if(old('number') === '1') selected @endif>1</option>
                        <option value="2" @if(old('number') === '2') selected @endif>2</option>
                        <option value="3" @if(old('number') === '3') selected @endif>3</option>
                        <option value="4" @if(old('number') === '4') selected @endif>4</option>
                        <option value="5" @if(old('number') === '5') selected @endif>5</option>
                        <option value="6" @if(old('number') === '6') selected @endif>6</option>
                        <option value="7" @if(old('number') === '7') selected @endif>7</option>
                        <option value="8" @if(old('number') === '8') selected @endif>8</option>
                        <option value="9" @if(old('number') === '9') selected @endif>9 or more</option>

                    </select>
                </label>
            </div>

            <div class="selectdiv" style="margin-bottom: 24px;">
                <label>
                    <select name="type">
                        <option selected>event type.</option>
                        <option value="0" @if(old('type') === '0') selected @endif>undecided</option>
                        <option value="1" @if(old('type') === '1') selected @endif>date</option>
                        <option value="2" @if(old('type') === '2') selected @endif>go out drinking</option>
                        <option value="3" @if(old('type') === '3') selected @endif>sexual</option>
                        <option value="4" @if(old('type') === '4') selected @endif>party</option>
                        <option value="5" @if(old('type') === '5') selected @endif>outdoor</option>
                        <option value="6" @if(old('type') === '6') selected @endif>trip with</option>
                        <option value="7" @if(old('type') === '7') selected @endif>online</option>
                        <option value="8" @if(old('type') === '8') selected @endif>other</option>
                    </select>
                </label>
            </div>


            <div class="form-group" id="eventform">
                <label for="content">introduce.</label>
                <textarea type="text" name="introduce" class="form-control" rows="8">{{ old('introduce') }}</textarea>
            </div>

            <div class="mt-3" style="float: right">
                <button type="submit" class="btn btn-outline-primary" style="margin-right:0px;">post.</button>
            </div>

        </form>
</div>

@endsection
