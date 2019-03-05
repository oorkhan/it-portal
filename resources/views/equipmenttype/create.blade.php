@extends('layouts.app')
@section('title', 'Add type')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col">
                <form action="{{route('equipmenttype-store')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="typename">{{trans('equipmenttype.name')}}</label>
                        <input type="text" class="form-control" id="typename" name="name" value="{{old('name')}}">
                    </div>
                    <button type="submit" class="btn btn-warning">{{trans('form-elements.add-btn')}}</button>
                    <a class="btn btn-secondary" href="{{route('equipmenttype-index')}}">{{trans('form-elements.cancel-btn')}}</a>
                </form>
                @if($errors->any())
                    @include('partials.errors')
                @endif
            </div>
        </div>
    </div>

@endsection