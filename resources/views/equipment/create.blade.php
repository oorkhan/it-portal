@extends('layouts.app')
@section('title', 'Add equipment type')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col">
                <form action="/equipment" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="model">{{trans('equipment.model')}}</label>
                        <input type="text" class="form-control" id="model" name="model" value="{{old('model')}}">
                    </div>
                    <div class="form-group">
                        <label for="serial_no">{{trans('equipment.serial')}}</label>
                        <input type="text" class="form-control" id="serial_no" name="serial_no" value="{{old('serial_no')}}">
                    </div>
                    <div class="form-group">
                        <label for="inventory_number">{{trans('equipment.inventoryno')}}</label>
                        <input type="text" class="form-control" id="inventory_number" name="inventory_number" value="{{old('inventory_number')}}">
                    </div>
                    <div class="form-group">
                        <label for="purchase_date">{{trans('equipment.purchase-date')}}</label>
                        <input type="date" class="form-control" id="purchase_date" name="purchase_date" value="{{old('purchase_date')}}">
                    </div>

                    <div class="form-group">
                        <label for="EquipmentType_id">{{trans('equipment.type')}}</label>
                        <select id="EquipmentType_id" class="form-control" name="EquipmentType_id">
                            <option selected>{{trans('form-elements.select-default')}}</option>
                            @foreach($types as $type)
                                <option {{old('EquipmentType_id') == $type->id ? 'selected': ''}} value="{{$type->id}}">{{$type->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="user_id">{{trans('equipment.user')}}</label>
                        <select id="user_id" class="form-control" name="user_id">
                            <option selected>{{trans('form-elements.select-default')}}</option>
                            @foreach($users as $user)
                                <option {{old('user_id') == $user->id ? 'selected': ''}} value="{{$user->id}}">{{$user->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="room_id">{{trans('equipment.location')}}</label>
                        <select id="room_id" class="form-control" name="room_id">
                            <option selected>{{trans('form-elements.select-default')}}</option>
                            @foreach($rooms as $room)
                                <option {{old('room_id') == $room->id ? 'selected': ''}} value="{{$room->id}}">{{$room->name}}</option>
                            @endforeach
                        </select>
                    </div>



                    <button type="submit" class="btn btn-warning">{{trans('form-elements.add-btn')}}</button> <a class="btn btn-secondary" href="/equipment">{{trans('form-elements.cancel-btn')}}</a>
                </form>
                @if($errors->any())
                    @include('partials.errors')
                @endif
            </div>
        </div>
    </div>
@endsection