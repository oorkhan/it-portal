@extends('layouts.app')
@section('title', $department->name)
@section('content')

<div class="container">
    <div class="row">
        <div class="col">

            <h2>{{trans('department.department')}}: <strong>{{$department->name}}</strong></h2>
            <div class="buttons mb-2">
                <a class="btn btn-secondary btn-sm" href="{{route('department-index')}}">{{trans('form-elements.back-to-list')}}</a>
                <a class="btn btn-warning btn-sm" href="{{$department->path('edit')}}">{{trans('form-elements.edit-btn')}}</a>
                <button class="btn-danger btn-sm btn" onclick="if(confirm('Are you sure?')){$('#deleteForm').submit()}">
                    {{trans('form-elements.delete-btn')}}
                    <form method="post" action="{{$department->path('delete')}}" id="deleteForm">
                        @csrf
                        @method('DELETE')
                    </form>
                </button>
            </div>
            <h3>{{trans('department.description')}}</h3>
            <p>{{$department->description}}</p>
            @if(session('message'))
                @include('partials.message')
            @endif
        </div>
    </div>
</div>

@endsection