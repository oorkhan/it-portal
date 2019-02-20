@extends('layouts.app')
@section('title', 'Add equipment')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col">
                <form action="/equipment-types" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="equipmentType">Equipment types name</label>
                        <input type="text" class="form-control" id="equipmentType" name="name" value="{{old('name')}}">
                    </div>
                    <button type="submit" class="btn btn-warning">Add equipment type</button> <a class="btn btn-secondary" href="/equipment-types">Cancel</a>
                </form>
                @if($errors->any())
                    @include('partials.errors')
                @endif
            </div>
        </div>
    </div>

@endsection