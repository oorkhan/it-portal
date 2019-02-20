@extends('layouts.app')
@section('title', $equipment->model)
@section('content')

    <div class="container">
        <div class="row">
            <div class="col">
                <div class="mb-2">
                    <h1>Equipment: {{$equipment->model}}</h1>
                    <div>
                        Serial: {{$equipment->serial_no}},
                        inventory no.: {{$equipment->inventory_number}},
                    </div>
                    <div>
                        Date of purchase: {{$equipment->purchase_date}}
                        {{$equipment->deleted_date ? ', Date of deletion: '.$equipment->deleted_date : ''}}
                    </div>
                    <div>
                        Used by: <a target="_blank" href="{{$equipment->user->path()}}">{{$equipment->user->name}}</a>,
                        located in <a target="_blank" href="{{$equipment->room->path()}}">{{$equipment->room->name}}</a>
                    </div>

                </div>
                <a class="btn btn-secondary btn-sm" href="/equipment">Back to List</a>
                <a class="btn btn-warning btn-sm" href="{{$equipment->path()}}/edit">Edit</a>
                <button class="btn-danger btn-sm btn" onclick="if(confirm('Are you sure?')){$('#deleteForm').submit()}">
                    Delete
                    <form method="post" action="{{$equipment->path()}}" id="deleteForm">
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