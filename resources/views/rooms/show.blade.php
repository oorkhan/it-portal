@extends('layouts.app')
@section('title', $room->name.' room')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col">
                <div class="mb-2">
                    <h1>{{trans('rooms.room')}}: {{$room->name}}</h1>
                    <div><b>{{trans('campuses.campus')}}:</b> {{$room->campus->name}}</div>
                    <div><b>{{trans('rooms.number-of-people')}}:</b> {{$room->numberOfPeople}} | <b>{{trans('rooms.type')}}:</b> {{$room->type}}</div>
                </div>
                <a class="btn btn-secondary btn-sm" href="{{route('room-index')}}">{{trans('form-elements.back-to-list')}}</a>
                <a class="btn btn-warning btn-sm" href="{{$room->path('edit')}}">{{trans('form-elements.edit-btn')}}</a>
                <button class="btn-danger btn-sm btn" onclick="if(confirm('Are you sure?')){$('#deleteForm').submit()}">
                    {{trans('form-elements.delete-btn')}}
                    <form method="post" action="{{$room->path('destroy')}}" id="deleteForm">
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