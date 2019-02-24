@extends('layouts.app')
@section('title', $equipment->model)
@section('content')

    <div class="container">
        <div class="row">
            <div class="col">
                <div class="mb-2">
                    <h1>{{trans('equipment.equipment')}}: {{$equipment->model}}</h1>
                    <div>
                        {{trans('equipment.serial')}}: {{$equipment->serial_no}},
                        {{trans('equipment.inventoryno')}}: {{$equipment->inventory_number}},
                    </div>
                    <div>
                        {{trans('equipment.purchase-date')}}: {{$equipment->purchase_date}}
                        {{$equipment->deleted_date ? ', Date of deletion: '.$equipment->deleted_date : ''}}
                    </div>
                    <div>
                        {{trans('equipment.user')}}: <a target="_blank" href="{{$equipment->user->path()}}">{{$equipment->user->name}}</a>,
                        {{trans('equipment.location')}}: <a target="_blank" href="{{$equipment->room->path()}}">{{$equipment->room->name}}</a>
                    </div>

                </div>
                <a class="btn btn-secondary btn-sm" href="/equipment">{{trans('form-elements.back-to-list')}}</a>
                <a class="btn btn-warning btn-sm" href="{{$equipment->path()}}/edit">{{trans('form-elements.edit-btn')}}</a>
                <button class="btn-danger btn-sm btn" onclick="if(confirm('Are you sure?')){$('#deleteForm').submit()}">
                    {{trans('form-elements.delete-btn')}}
                    <form method="post" action="{{$equipment->path()}}" id="deleteForm">
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