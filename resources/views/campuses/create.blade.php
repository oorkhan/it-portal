@extends('layouts.app')
@section('title', 'Add Campus')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col">
                <form action="/campuses" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="campusName">Campus name</label>
                        <input type="text" class="form-control" id="campusName" name="name" value="{{old('name')}}">
                    </div>
                    <div class="form-group">
                        <label for="campusAddress">Address of the campus</label>
                        <input type="text" class="form-control" id="campusAddress" name="address" value="{{old('address')}}">
                    </div>
                    <button type="submit" class="btn btn-warning">Add Campus</button> <a class="btn btn-secondary" href="/campuses">Cancel</a>
                </form>
                @if($errors->any())
                    @include('partials.errors')
                @endif
            </div>
        </div>
    </div>

@endsection