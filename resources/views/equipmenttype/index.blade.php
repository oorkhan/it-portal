@extends('layouts.app')
@section('title', 'Equipment types')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col">
                <h1>{{trans('equipmenttype.all')}}</h1>
                <div class="d-flex justify-content-end mb-2"><a class="btn btn-primary" href="{{route('equipmenttype-create')}}">{{trans('equipmenttype.add')}}</a></div>
                <div>
                    @if(count($equipmenttypes)>=1)
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th scope="col">{{trans('equipmenttype.name')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($equipmenttypes as $type)
                        <tr>
                            <td><a href="{{$type->path('show')}}">{{$type->name}}</a></td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                    @else
                        No types added yet.
                    @endif
                </div>
                @if(session('message'))
                    @include('partials.message')
                @endif
            </div>
        </div>
    </div>

@endsection