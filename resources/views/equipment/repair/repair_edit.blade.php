@extends('layouts.app')
@section('title', 'Repair Edit')
@section('content')

<div class="container">
    <div class="row">
        <div class="col">
            <form action="{{route('equipment-repair-update', ['eid' => $equipment->id, 'rid' => $repair->id])}}" method="post">
                @csrf
                @method('patch')
                <div class="form-group">
                    <label for="company">{{trans('equipment.company')}}</label>
                    <input type="text" class="form-control" id="company" name="company" value="{{old('company') ?? $repair->company}}">
                </div>
                <div class="form-group">
                    <label for="description">{{trans('equipment.description')}}</label>
                    <textarea class="form-control" name="description" id="description">{{old('repair_description') ?? $repair->description}}</textarea>
                </div>
                <div class="form-group">
                    <label for="repair_start">{{trans('equipment.repair_start')}}</label>
                    <input type="date" class="form-control" id="repair_start" name="repair_start" value="{{old('repair_start')?? $repair->repair_start}}">
                </div>
                <div class="form-group">
                    <label for="repair_finish">{{trans('equipment.repair_finish')}}</label>
                    <input type="date" class="form-control" id="repair_finish" name="repair_finish" value="{{old('repair_finish') ?? $repair->repair_finish}}">
                </div>
                <div class="form-check">
                    <input {{$repair->is_repaired ? 'checked' : ''}} class="form-check-input" type="checkbox" value="" id="is_repaired" name="is_repaired">
                    <label class="form-check-label" for="is_repaired">
                        {{trans('equipment.is_repaired')}}
                    </label>
                </div>
                <button type="submit" class="btn btn-warning">{{trans('form-elements.update-btn')}}</button>
                <a class="btn btn-secondary" href="{{URL::previous()}}">{{trans('form-elements.cancel-btn')}}</a>
            </form>
            @if($errors->any())
                @include('partials.errors')
            @endif
        </div>
    </div>
</div>

@endsection