@extends('layouts.app')
@section('title', $equipmenttype->name.' type')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col">
                <div class="mb-2">
                    <h1>{{trans('equipmenttype.name')}}: {{$equipmenttype->name}}</h1></div>
                <a class="btn btn-secondary btn-sm" href="{{route('equipmenttype-index')}}">{{trans('form-elements.back-to-list')}}</a>
                <a class="btn btn-warning btn-sm" href="{{$equipmenttype->path('edit')}}">{{trans('form-elements.edit-btn')}}</a>
                <button class="btn-danger btn-sm btn" onclick="if(confirm('Are you sure?')){$('#deleteForm').submit()}">
                    {{trans('form-elements.delete-btn')}}
                    <form method="post" action="{{$equipmenttype->path('delete')}}" id="deleteForm">
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