@extends('layouts.app')
@section('title', 'Edit equipment')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col">
                <form action="{{$equipment->path('update')}}" method="post">
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                        <label for="name">{{trans('equipment.model')}}</label>
                        <input type="text" class="form-control" id="model" name="model" value="{{$equipment->model ?? old('model')}}">
                    </div>
                    <div class="form-group">
                        <label for="name">{{trans('equipment.manufacturer')}}</label>
                        <input type="text" class="form-control" id="manufacturer" name="manufacturer" value="{{$equipment->manufacturer ?? old('manufacturer')}}">
                    </div>
                    <div class="form-group">
                        <label for="name">{{trans('equipment.serial')}}</label>
                        <input type="text" class="form-control" id="serial" name="serial" value="{{$equipment->serial ??old('serial')}}">
                    </div>
                    <div class="form-group">
                        <label for="inventoryNo">{{trans('equipment.inventory_no')}}</label>
                        <input type="text" class="form-control" id="inventoryNo" name="inventory_no" value="{{$equipment->inventory_no ?? old('inventory_no')}}">
                    </div>
                    <div class="form-group">
                        <label for="dateOfPurchase">{{trans('equipment.purchase_date')}}</label>
                        <input type="date" class="form-control" id="dateOfPurchase" name="purchase_date" value="{{$equipment->purchase_date ?? old('purchase_date')}}">
                    </div>
                    @if(count($rooms) >=1)
                        <div class="form-group">
                            <label for="roomSelect">{{trans('equipment.location')}}</label>
                            <select id="roomSelect" class="form-control" name="room_id">
                                <option selected>{{trans('form-elements.select-default')}}</option>
                                @foreach($rooms as $room)
                                    <option {{$equipment->room->id == $room->id ? 'selected' : ''}} {{old('room_id') == $room->id ? 'selected': ''}} value="{{$room->id}}"> {{$room->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    @endif
                    @if(count($types) >=1)
                        <div class="form-group">
                            <label for="typeSelect">{{trans('equipment.type')}}</label>
                            <select id="typeSelect" class="form-control" name="equipmenttype_id">
                                <option selected>{{trans('form-elements.select-default')}}</option>
                                @foreach($types as $type)
                                    <option {{$equipment->equipmenttype->id == $type->id ? 'selected' : ''}} {{old('equipmenttype_id') == $type->id ? 'selected': ''}} value="{{$type->id}}"> {{$type->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    @endif
                    @if(count($users) >=1)
                        <div class="form-group">
                            <label for="userSelect">{{trans('equipment.user')}}</label>
                            <select id="userSelect" class="form-control" name="user_id">
                                <option selected>{{trans('form-elements.select-default')}}</option>
                                @foreach($users as $user)
                                    <option {{$equipment->user->id == $user->id ? 'selected' : ''}} {{old('user_id') == $user->id ? 'selected': ''}} value="{{$user->id}}"> {{$user->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    @endif
                    <button type="submit" class="btn btn-warning">{{trans('form-elements.update-btn')}}</button>
                    <a class="btn btn-secondary" href="{{$equipment->path('show')}}">{{trans('form-elements.cancel-btn')}}</a>
                </form>
                @if($errors->any())
                    @include('partials.errors')
                @endif
            </div>
        </div>
    </div>

@endsection