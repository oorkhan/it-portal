@extends('layouts.app')
@section('title', 'All users')
@section('content')

<div class="container">
    <div class="row">
        <div class="col">
            <h1>{{trans('users.all')}}</h1>
            <div class="d-flex justify-content-end mb-2">
                @can('create')
                    <a class="btn btn-primary" href="{{route('users-create')}}">{{trans('form-elements.add-btn')}}</a>
                @else
                    <a class="btn btn-secondary disabled" role="button" aria-disabled="true" href="#">{{trans('form-elements.add-btn')}}</a>
                @endcan
            </div>
            @if(count($users)>=1)
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">{{trans('users.name')}}</th>
                        <th scope="col">{{trans('users.email')}}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td><a href="{{$user->path('show')}}">{{$user->name}}</a></td>
                            <td><a href="mailto:{{$user->email}}">{{$user->email}}</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            <div>
                @else
                    {{trans('users.not_yet_added')}}
                @endif
            </div>
            @if(session('message'))
                @include('partials.message')
            @endif
        </div>
    </div>
</div>

@endsection