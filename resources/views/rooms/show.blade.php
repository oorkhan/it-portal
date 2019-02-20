@extends('layouts.app')
@section('title', $room->name.' room')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col">
                <div class="mb-2">
                    <h1>Room: {{$room->name}}</h1>
                    <div><b>Campus:</b> {{$room->campus->name}}</div>
                    <div><b>Number of people:</b> {{$room->numberOfPeople}} | <b>Type:</b> {{$room->type}}</div>
                </div>
                <a class="btn btn-secondary btn-sm" href="/rooms">Back to List</a>
                <a class="btn btn-warning btn-sm" href="{{$room->path()}}/edit">Edit</a>
                <button class="btn-danger btn-sm btn" onclick="if(confirm('Are you sure?')){$('#deleteForm').submit()}">
                    Delete
                    <form method="post" action="{{$room->path()}}" id="deleteForm">
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