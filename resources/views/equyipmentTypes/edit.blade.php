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
                        <label for="campusName">Equipment type name</label>
                        <input type="text" class="form-control" id="campusName" name="name" value="{{old('name') ? old('name') : $equipmentType->name}}">
                    </div>
                    <button type="submit" class="btn btn-warning">Update campus</button>
                </form>
                @if($errors->any())
                    @include('partials.errors')
                @endif

            </div>
        </div>
    </div>

@endsection