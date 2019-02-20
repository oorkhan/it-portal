@extends('layouts.app')
@section('title', $equipmentType->name)
@section('content')

    <div class="container">
        <div class="row">
            <div class="col">
                <div class="mb-2">
                    <h1>Type: {{$equipmentType->name}}</h1>

                </div>
                <a class="btn btn-secondary btn-sm" href="/campuses">Back to List</a>
                <a class="btn btn-warning btn-sm" href="{{$equipmentType->path()}}/edit">Edit</a>
                <button class="btn-danger btn-sm btn" onclick="if(confirm('Are you sure?')){$('#deleteForm').submit()}">
                    Delete
                    <form method="post" action="{{$equipmentType->path()}}" id="deleteForm">
                        @csrf
                        @method('DELETE')
                    </form>
                </button>
                @if(session('message'))
                    @include('partials.message')
                @endif
            </div>
        </div>
    </div>

@endsection