@extends('layouts.app')
@section('title', 'View Project')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col">
                <div class="panel panel-primary">
                    <div class="panel-heading"><h2>{{$project->title}}</h2></div>
                    <div class="panel-body">

                        <p>{{$project->description}}</p></div>
                </div>
                <div>
                    <a href="{{$project->path()}}/edit" class="btn btn-primary mr-2">Edit
                    </a><a href="/projects" class="btn btn-secondary mr-2">Back</a>
                    <a class="btn btn-danger" href="#" onclick="if(confirm('Are you sure?')){$('#deleteform').submit()}">
                        DELETE
                    </a>
                    <form method="post" id="deleteform" action="{{$project->path()}}">
                        @csrf
                        @method('DELETE')
                    </form>
                </div>
                @if(session('message'))
                    @include('partials.message')
                @endif
            </div>
            <div class="col">
                <h1>Tasks</h1>

                    <div class="mb-2">
                        @forelse($project->tasks as $task)
                        <form action="{{$task->path()}}" method="post">
                            @csrf
                            @method('PATCH')
                            <div class="form-check">
                                <input {{$task->completed ? 'checked' : ''}} onchange="this.form.submit()" type="checkbox" class="form-check-input" id="taskCheck" name="completed">
                                <label class="form-check-label" for="taskCheck">Complete: {{$task->description}}</label>
                            </div>
                        </form>

                        @empty
                        no tasks yet
                        @endforelse
                    </div>
                <form method="POST" action="{{$project->path()}}/tasks" class="form-inline">
                    @csrf
                    <div class="form-group w-100">
                        <input required name="description" type="text" class="form-control w-75 mr-2" id="createTask">
                        <button type="submit" class="btn btn-primary">Add Task</button>
                    </div>

                </form>
                @if($errors->any())
                    @include('projects.errors')
                @endif
            </div>
        </div>
    </div>
@endsection