@extends('layouts.app')
@section('title', 'Edit '.$user->name)
@section('content')

<div class="container">
    <div class="row">
        <div class="col">
            <form action="{{$user->path('update')}}" method="post">
                @csrf
                @method('patch')
                <div class="form-group">
                    <label for="name">{{trans('user.name')}}</label>
                    <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" type="text" name="name" id="name" value="{{old('name')??$user->name}}">
                    @if ($errors->has('name'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>
                <button type="submit" class="btn btn-warning">{{trans('form-elements.add-btn')}}</button>
                <a class="btn btn-secondary" href="{{route('users-index')}}">{{trans('form-elements.cancel-btn')}}</a>
            </form>
        </div>
    </div>
</div>

@endsection