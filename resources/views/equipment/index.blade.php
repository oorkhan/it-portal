@extends('layouts.app')
@section('title', 'Equipment')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col">
                <h1>All Equipment</h1>
                <div class="d-flex justify-content-end mb-2"><a class="btn btn-primary" href="/equipment/create">Add Equipment</a></div>
                <div>
                    @if(count($equipment)>=1)
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th scope="col">Model</th>
                            <th scope="col">Type</th>
                            <th scope="col">Invent. no.</th>
                            <th scope="col">Serial</th>
                            <th scope="col">Location</th>
                            <th scope="col">User</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($equipment as $item)
                        <tr>
                            <td><a href="{{$item->path()}}">{{$item->model}}</a></td>
                            <td>{{$item->equipmentType->name}}</td>
                            <td>{{$item->inventory_number}}</td>
                            <td>{{$item->serial_no}}</td>
                            <td><a href="{{$item->room->path()}}">{{$item->room->name}}</a></td>
                            <td><a href="{{$item->user->path()}}">{{$item->user->name}}</a></td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                    @else
                        No equipment added yet.
                    @endif
                </div>
                @if(session('message'))
                    @include('partials.message')
                @endif
            </div>
        </div>
    </div>

@endsection