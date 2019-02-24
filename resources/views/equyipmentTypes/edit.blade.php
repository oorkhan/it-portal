@extends('layouts.app')
@section('title', 'Edit '.$equipmentType->name)
@section('content')

    <div class="container">
        <div class="row">
            <div class="col">
                <form action="{{$equipmentType->path()}}" method="post">
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                        <label for="campusName">{{trans('equipment-types.name')}}</label>
                        <input type="text" class="form-control" id="campusName" name="name" value="{{old('name') ? old('name') : $equipmentType->name}}">
                    </div>
                    <button type="submit" class="btn btn-warning">{{trans('form-elements.update-btn')}}</button>
                    <a class="btn btn-secondary" href="{{$equipmentType->path()}}">{{trans('form-elements.cancel-btn')}}</a>
                </form>
                @if($errors->any())
                    @include('partials.errors')
                @endif

            </div>
        </div>
    </div>

@endsection