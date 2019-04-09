@extends('layouts.app')
@section('title', 'Edit '.$department->name)
@section('content')

<div class="container">
    <div class="row">
        <div class="col">
            <form action="{{$department->path('update')}}" method="post">
                @csrf
                @method('patch')
                <div class="form-group">
                    <label for="name">{{trans('department.name')}}</label>
                    <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" type="text" name="name" id="name" value="{{old('name')??$department->name}}">
                    @if ($errors->has('name'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="description">{{trans('department.description')}}</label>
                    <textarea class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" id="description" cols="30" rows="10">{{old('description')??$department->description}}</textarea>
                    @if ($errors->has('description'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>
                <button type="submit" class="btn btn-warning">{{trans('form-elements.update-btn')}}</button>
                <a class="btn btn-secondary" href="{{route('department-index')}}">{{trans('form-elements.cancel-btn')}}</a>
            </form>
        </div>
    </div>
</div>

@endsection