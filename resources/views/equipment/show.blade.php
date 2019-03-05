@extends('layouts.app')
@section('title', $equipment->model)
@section('content')

<div class="container">
    <div class="mb-2"><h1>{{$equipment->equipmenttype->name}}: {{$equipment->model}}</h1></div>
    <div class="buttons mb-2">
        <a class="btn btn-secondary btn-sm" href="{{route('equipment-index')}}">{{trans('form-elements.back-to-list')}}</a>
        <a class="btn btn-warning btn-sm" href="{{$equipment->path('edit')}}">{{trans('form-elements.edit-btn')}}</a>
        <button class="btn-danger btn-sm btn" onclick="if(confirm('Are you sure?')){$('#deleteForm').submit()}">
            {{trans('form-elements.delete-btn')}}
            <form method="post" action="{{$equipment->path('delete')}}" id="deleteForm">
                @csrf
                @method('DELETE')
            </form>
        </button>
    </div>
    <div class="row">
        <div class="col">
            <div class="details">
                <h3>{{trans('equipment.details')}}:</h3>
                @if($equipment->user->name)
                    <div>{{trans('equipment.user')}}: <a href="{{$equipment->user->path('show')}}">{{$equipment->user->name}}</a></div>
                @else
                <div>trans('equipment.no_user')</div>
                @endif

                @if($equipment->room->name)
                    <div>{{trans('equipment.location')}}: <a href="{{$equipment->room->path('show')}}">{{$equipment->room->name}}</a></div>
                @else
                    <div>trans('equipment.no_location')</div>
                @endif
                <div>{{trans('equipment.type')}}: {{$equipment->equipmenttype->name}}</div>
                <div>
                    {{trans('equipment.manufacturer')}}: {{$equipment->manufacturer ?? trans('equipment.no_manufacturer')}}
                </div>
                <div>
                    {{trans('equipment.serial')}}: {{$equipment->serial ?? trans('equipment.no_serial')}}
                </div>
                <div>
                    {{trans('equipment.inventory_no')}}: {{$equipment->inventory_no ?? trans('equipment.no_inventory_no')}}
                </div>
                <div>
                    {{trans('equipment.purchase_date')}}: {{$equipment->purchase_date ?? trans('equipment.no_purchase_date')}}
                </div>
                <div>
                    {{trans('equipment.deletion_date')}}: {{$equipment->deletion_date ?? trans('equipment.no_deletion_date')}}
                </div>
            </div>
        </div>{{--end of details--}}
        <div class="col">
            <h3>{{trans('equipment.transactions')}}: </h3>
            <div class="buttons">
                <a class="btn btn-primary btn-sm" href="{{route('equipment-owner-change', ['id' => $equipment->id])}}">
                    {{trans('equipment.change_user')}}
                </a>
            </div>
            make ajax to EquipmentOwnerController@index<br>
            <div class="owner_changes">
                <h3>{{trans('equipment.owner_changes')}}</h3>
                <ol>
                    @foreach($ownerChanges as $change)
                        <li>
                            <?php
                                $prevOwner = $users->where('id', $change->prev_user_id)->first();
                                $nextOwner = $users->where('id', $change->next_user_id)->first();
                            ?>
                                <a href="{{route('equipment-owner-show', ['eid' => $equipment->id, 'cid' => $change->id ])}}">
                                    user change: from: {{$prevOwner->name}} to  {{$nextOwner->name}}
                                    {{trans('equipment.owner_change_date')}}: {{$change->created_at}}
                                </a>
                        </li>
                    @endforeach
                </ol>
            </div>

        </div>
    </div>
    @if(session('message'))
        @include('partials.message')
    @endif
</div>

@endsection