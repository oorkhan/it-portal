@extends('layouts.app')
@section('title', $user->name)
@section('content')

<div class="container">
    <div class="row">
        <div class="col">

            <h2>{{trans('users.user')}}: <strong>{{$user->name}}</strong></h2>
            <div class="buttons mb-2">
                <a class="btn btn-secondary btn-sm" href="{{route('users-index')}}">{{trans('form-elements.back-to-list')}}</a>
                <a class="btn btn-warning btn-sm" href="{{$user->path('edit')}}">{{trans('form-elements.edit-btn')}}</a>
                <a class="btn btn-primary btn-sm" href="{{$user->path('reset')}}">{{trans('form-elements.reset_pass')}}</a>
                <button class="btn-danger btn-sm btn" onclick="if(confirm('Are you sure?')){$('#deleteForm').submit()}">
                    {{trans('form-elements.delete-btn')}}
                    <form method="post" action="{{$user->path('delete')}}" id="deleteForm">
                        @csrf
                        @method('DELETE')
                    </form>
                </button>
            </div>
            <div>{{trans('users.email')}}: <a href="mailto:{{$user->email}}">{{$user->email}}</a></div>
            @if(count($user->equipment)>=1)
                <div>
                    <h3>{{trans('users.equipment')}}:</h3>
                    <ol>
                        @foreach($user->equipment as $equipmt)
                            <li><a target="_blank" href="{{$equipmt->path('show')}}">{{$equipmt->model}}</a></li>
                        @endforeach
                    </ol>
                </div>
            @endif
            @if(session('message'))
                @include('partials.message')
            @endif
        </div>
    </div>
</div>

@endsection