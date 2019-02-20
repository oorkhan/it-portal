@extends('layouts.app')
@section('title', 'Campuses')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col">
                <h1>All Campuses</h1>
                <div class="d-flex justify-content-end mb-2"><a class="btn btn-primary" href="/campuses/create">Add Campus</a></div>
                <div>
                    @if(count($campuses)>=1)
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Address</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($campuses as $campus)
                        <tr>
                            <td><a href="{{$campus->path()}}">{{$campus->name}}</a></td>
                            <td>{{$campus->address}}</td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                    @else
                        No campuses added yet.
                    @endif
                </div>
                @if(session('message'))
                    @include('partials.message')
                @endif
            </div>
        </div>
    </div>

@endsection