@extends('layouts.app')
@section('title', 'Edit Project')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col">
                <h1>Edit project</h1>
                <form action="{{$project->path()}}" method="post">
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                        <label for="title">Project title</label>
                        <input type="text" class="form-control" id="title" name="title" value="{{$project->title}}">
                    </div>
                    <div class="form-group">
                        <label for="description">Example textarea</label>
                        <textarea class="form-control" id="description" rows="3" name="description">{{$project->description}}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary mb-2">Edit Project</button>
                    <a href="/projects" class="btn btn-secondary mb-2">Cancel</a>
                </form>
                @if($errors->any())
                    @include('projects.errors')
                @endif
            </div>
        </div>
    </div>

@endsection