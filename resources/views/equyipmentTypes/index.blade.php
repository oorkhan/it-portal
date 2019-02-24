@extends('layouts.app')
@section('title', 'Equipment Types')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col">
                <h1>{{trans('equipment-types.all')}}</h1>
                <div class="d-flex justify-content-end mb-2"><a class="btn btn-primary" href="/equipment-types/create">{{trans('form-elements.add-btn')}}</a></div>
                <div>
                    @if(count($equipmentTypes)>=1)
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th scope="col">{{trans('equipment-types.name')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($equipmentTypes as $type)
                        <tr>
                            <td><a href="{{$type->path()}}">{{$type->name}}</a></td>
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