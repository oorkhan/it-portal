@extends('layouts.app')
@section('title', 'Edit type')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col">
                <form action="{{$equipmenttype->path('update')}}" method="post">
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                        <label for="typename">{{trans('equipmenttype.name')}}</label>
                        <input type="text" class="form-control" id="typename" name="name" value="{{$equipmenttype->name}}">
                    </div>
                    <button type="submit" class="btn btn-warning">{{trans('form-elements.update-btn')}}</button>
                    <a class="btn btn-secondary" href="{{$equipmenttype->path('show')}}">{{trans('form-elements.cancel-btn')}}</a>
                </form>
                @if($errors->any())
                    @include('partials.errors')
                @endif
            </div>
        </div>
    </div>

@endsection