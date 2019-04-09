@extends('layouts.app')
@section('title', 'All departments')
@section('content')

<div class="container">
    <div class="row">
        <div class="col">
            <h1>{{trans('department.all')}}</h1>
            <div class="d-flex justify-content-end mb-2">
                @can('create')
                    <a class="btn btn-primary" href="{{route('department-create')}}">{{trans('form-elements.add-btn')}}</a>
                @else
                    <a class="btn btn-secondary disabled" role="button" aria-disabled="true" href="#">{{trans('form-elements.add-btn')}}</a>
                @endcan
            </div>
            <div>
                @if(count($departments)>=1)
                    <ol>
                    @foreach($departments as $department)
                    <li><a href="{{$department->path('show')}}">{{$department->name}}</a></li>
                    @endforeach
                    </ol>
                @else
                    {{trans('department.not_yet_added')}}
                @endif
            </div>
            @if(session('message'))
                @include('partials.message')
            @endif
        </div>
    </div>
</div>

@endsection