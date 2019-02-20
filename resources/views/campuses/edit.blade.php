@extends('layouts.app')
@section('title', 'Edit '.$campus->name)
@section('content')

    <div class="container">
        <div class="row">
            <div class="col">
                <form action="{{$campus->path()}}" method="post">
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                        <label for="campusName">Campus name</label>
                        <input type="text" class="form-control" id="campusName" name="name" value="{{$campus->name}}">
                    </div>
                    <div class="form-group">
                        <label for="campusAddress">Address of the campus</label>
                        <input type="text" class="form-control" id="campusAddress" name="address" value="{{$campus->address}}">
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