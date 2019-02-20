@extends('layouts.app')
@section('title', 'Projects')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col">
                <h1>Projects</h1>
                @if(session('message'))
                    @include('partials.message')
                @endif
                @forelse ($projects as $project)
                    <div><a href="{{$project->path()}}">{{$project->title}}</a></div>
                @empty
                    <div>No projects yet</div>
                @endforelse
                <div class="mt-2"><a class="btn btn-primary" href="/projects/create">Add new project</a></div>
            </div>

        </div>
    </div>

@endsection