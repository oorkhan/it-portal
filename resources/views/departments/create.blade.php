@extends('layouts.app')
@section('title', 'Add department')
@section('content')

<div class="container">
    <div class="row">
        <div class="col">
            <form action="{{route('department-store')}}" method="post">
                @csrf
                <div class="form-group">
                    <label for="name">{{trans('department.name')}}</label>
                    <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" type="text" name="name" id="name" value="{{old('name')}}">
                    @if ($errors->has('name'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="description">{{trans('department.description')}}</label>
                    <textarea class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" id="description" cols="30" rows="10">{{old('description')}}</textarea>
                    @if ($errors->has('description'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>
                <button type="submit" class="btn btn-warning">{{trans('form-elements.add-btn')}}</button>
                <a class="btn btn-secondary" href="{{route('department-index')}}">{{trans('form-elements.cancel-btn')}}</a>
            </form>
        </div>
    </div>
</div>

@endsection