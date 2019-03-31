@extends('layouts.app')
@section('title', 'repair')
@section('content')

<div class="container">
    <div class="row">
        <div class="col">
            <h3>{{trans('equipment.repair')}}: {{$equipment->equipmenttype->name}} {{$equipment->model}}</h3>
            <form action="{{route('equipment-repair-store', ['id' => $equipment->id])}}" method="post">
                @csrf
                <input type="hidden" name="equipment_id" value="{{$equipment->id}}">
                <div class="form-group">
                    <label for="company">{{trans('equipment.repair_company')}}</label>
                    <input type="text" class="form-control" id="company" name="company" value="{{old('company')}}">
                </div>
                <div class="form-group">
                    <label for="description">{{trans('equipment.description')}}</label>
                    <textarea class="form-control" name="description" id="description">{{old('repair_description')}}</textarea>
                </div>
                <div class="form-group">
                    <label for="repair_start">{{trans('equipment.repair_start')}}</label>
                    <input type="date" class="form-control" id="repair_start" name="repair_start" value="{{old('repair_start')}}">
                </div>
                <button type="submit" class="btn btn-warning">{{trans('form-elements.add-btn')}}</button>
                <a class="btn btn-secondary" href="{{$equipment->path('show')}}">{{trans('form-elements.cancel-btn')}}</a>
            </form>
            @if($errors->any())
                @include('partials.errors')
            @endif

        </div>

    </div>
</div>

@endsection