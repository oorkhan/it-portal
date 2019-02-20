@extends('layouts.app')
@section('title', 'Create Project')
@section('content')

<div class="container">
    <div class="row">
        <div class="col">
            <h1>Create Project</h1>
            <form action="/projects" method="post">
                @csrf
                <div class="form-group">
                    <label for="title">Project title</label>
                    <input  value="{{old('title')}}" type="text" class="form-control {{$errors->has('title') ? 'border border-danger' : ''}}" id="title" name="title">
                </div>
                <div class="form-group">
                    <label for="description">Example textarea</label>
                    <textarea required class="form-control {{$errors->has('title') ? 'border border-danger' : ''}}" id="description" rows="3" name="description">{{old('title')}}</textarea>
                </div>
                <button type="submit" class="btn btn-primary mb-2">Create Project</button>
            </form>
            @if($errors->any())
            @include('projects.errors')
            @endif
        </div>
    </div>
</div>

@endsection