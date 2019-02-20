@extends('layouts.app')
@section('title', 'rooms')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col">
                <h1>All rooms</h1>
                <div class="d-flex justify-content-end mb-2"><a class="btn btn-primary" href="/rooms/create">Add room</a></div>
                <div>
                    @if(count($rooms)>=1)
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Type</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($rooms as $room)
                        <tr>
                            <td><a href="{{$room->path()}}">{{$room->name}}</a></td>
                            <td>{{$room->type}}</td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                    @else
                        No rooms added yet.
                    @endif
                </div>
                @if(session('message'))
                    @include('partials.message')
                @endif
            </div>
        </div>
    </div>

@endsection