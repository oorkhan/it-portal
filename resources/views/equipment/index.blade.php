@extends('layouts.app')
@section('title', 'Equipment list')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col">
                <h1>{{trans('equipment.all')}}</h1>
                <div class="d-flex justify-content-end mb-2"><a class="btn btn-primary" href="{{route('equipment-create')}}">{{trans('equipment.add')}}</a></div>
                <div>
                    @if(count($allEquipment)>=1)
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th scope="col">{{trans('equipment.model')}}</th>
                            <th scope="col">{{trans('equipment.user')}}</th>
                            <th scope="col">{{trans('equipment.location')}}</th>
                            <th scope="col">{{trans('equipment.inventory_no')}}</th>
                            <th scope="col">{{trans('equipment.status')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($allEquipment as $equipment)
                        <tr>
                            <td><a href="{{$equipment->path('show')}}">{{$equipment->model}}</a></td>
                            <td><a href="{{$equipment->user->path('show')}}">{{$equipment->user->name}}</a></td>
                            <td><a href="{{$equipment->room->path('show')}}">{{$equipment->room->name}}</a></td>
                            <td>{{$equipment->inventory_no}}</td>
                            <td>
                                <span class="{{$equipment->is_deleted ? 'text-danger' : 'text-success'}}">
                                {{$equipment->is_deleted ? trans('equipment.is_deleted') : trans('equipment.active')}}
                                </span>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                    @else
                        {{trans('equipment.not_added')}}
                    @endif
                </div>
                @if(session('message'))
                    @include('partials.message')
                @endif
            </div>
        </div>
    </div>

@endsection