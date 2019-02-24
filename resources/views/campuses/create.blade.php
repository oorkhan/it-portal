@extends('layouts.app')
@section('title', 'Add Campus')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col">
                <form action="/campuses" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="campusName">{{trans('campuses.name')}}</label>
                        <input type="text" class="form-control" id="campusName" name="name" value="{{old('name')}}">
                    </div>
                    <div class="form-group">
                        <label for="campusAddress">{{trans('campuses.address')}}</label>
                        <input type="text" class="form-control" id="campusAddress" name="address" value="{{old('address')}}">
                    </div>
                    <button type="submit" class="btn btn-warning">{{trans('form-elements.add-btn')}}</button>
                    <a class="btn btn-secondary" href="/campuses">{{trans('form-elements.cancel-btn')}}</a>
                </form>
                @if($errors->any())
                    @include('partials.errors')
                @endif
            </div>
        </div>
    </div>

@endsection