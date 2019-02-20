@extends('layouts.app')
@section('title', 'Equipment Types')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col">
                <h1>All Equipment types</h1>
                <div class="d-flex justify-content-end mb-2"><a class="btn btn-primary" href="/equipment-types/create">Add Equipment type</a></div>
                <div>
                    @if(count($equipmentTypes)>=1)
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th scope="col">Name</th>
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