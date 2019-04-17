@extends('layouts.app')
@section('title', 'Add user')
@section('content')

<div class="container">
    <div class="row">
        <div class="col">
            <form action="{{route('users-store')}}" method="post">
                @csrf
                <div class="form-group">
                    <label for="name">{{trans('users.name')}}</label>
                    <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" type="text" name="name" id="name" value="{{old('name')}}">
                    @if ($errors->has('name'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="email">{{trans('users.email')}}</label>
                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>
                    @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="password">{{trans('users.password')}}</label>
                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                    @if ($errors->has('password'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="password-confirm">{{trans('users.password-confirm')}}</label>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                </div>
                <button type="submit" class="btn btn-warning">{{trans('form-elements.add-btn')}}</button>
                <a class="btn btn-secondary" href="{{route('users-index')}}">{{trans('form-elements.cancel-btn')}}</a>
            </form>
        </div>
    </div>
</div>

@endsection