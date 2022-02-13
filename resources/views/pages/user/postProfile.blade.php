@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-10 col-md-offset-2 mx-auto">
        <h2>profile</h2>
        <p>***introdice yourself to other users***</p>
        <form method="POST" action="{{ route('users.storeProfile') }}" onSubmit="return checkSubmit()">
          @csrf
            <div class="form-group">
                <label for="age">age</label>
            <input id="title" name="age" class="form-control"
                    value="{{ old('age') }}" type="text">
                @if ($errors->has('age'))
                    <div class="text-danger">{{ $errors->first('age') }}</div>
                @endif
            </div>
            <div class="form-group">
                <label for="title">$income/year</label>
            <input id="title" name="income" class="form-control"
                    value="{{ old('income') }}" type="text">
                @if ($errors->has('income'))
                    <div class="text-danger">{{ $errors->first('income') }}</div>
                @endif
            </div>

            <div class="form-group">
                <label for="content">introduce</label>
                <textarea type="text" id="introduce" name="introduce" class="form-control" rows="13" value="{{ old('introduce') }}">
                </textarea>
                @if ($errors->has('introduce'))
                    <div class="text-danger">{{ $errors->first('introduce') }}</div>
                @endif
            </div>

            <div class="mt-5">
                <button type="submit" class="btn btn-outline-primary">
                    post</button>
                <a class="btn btn-outline-secondary" href="{{ url('/users') }}">
                    cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection
