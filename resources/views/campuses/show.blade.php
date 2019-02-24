@extends('layouts.app')
@section('title', $campus->name.' campus')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col">
                <div class="mb-2">
                    <h1>{{trans('campuses.campus')}}: {{$campus->name}}</h1>
                     <b>{{trans('campuses.address')}}:</b> {{$campus->address}}

                </div>
                <a class="btn btn-secondary btn-sm" href="/campuses">{{trans('form-elements.back-to-list')}}</a>
                <a class="btn btn-warning btn-sm" href="{{$campus->path()}}/edit">{{trans('form-elements.edit-btn')}}</a>
                <button class="btn-danger btn-sm btn" onclick="if(confirm('Are you sure?')){$('#deleteForm').submit()}">
                    {{trans('form-elements.delete-btn')}}
                    <form method="post" action="{{$campus->path()}}" id="deleteForm">
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