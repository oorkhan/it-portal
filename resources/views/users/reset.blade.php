@extends('layouts.app')
@section('title', '')
@section('content')

<div class="container">
    <div class="row">
        <div class="col">
            <form action="{{$user->path('resetstore')}}" method="post">
                @csrf
                @method('patch')
                <div class="form-group">
                    <label for="password">{{trans('user.password')}}</label>
                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                    @if ($errors->has('password'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="password-confirm">{{trans('user.password-confirm')}}</label>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                </div>
                <button type="submit" class="btn btn-warning">{{trans('form-elements.add-btn')}}</button>
                <a class="btn btn-secondary" href="{{$user->path('show')}}">{{trans('form-elements.cancel-btn')}}</a>
            </form>

        </div>
    </div>
</div>

@endsection