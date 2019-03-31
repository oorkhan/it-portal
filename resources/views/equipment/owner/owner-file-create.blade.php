@extends('layouts.app')
@section('title', 'Add owner file')
@section('content')

<div class="container">
    <div class="row">
        <div class="col">
            <form action="{{route('owner-file-store', ['eid'=>$equipment->id, 'ocid' => $owner->id])}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="description">{{trans('equipment.owner_file_description')}}</label>
                    <input type="text" name="description" class="form-control" id="description" value="{{old('description')}}">
                </div>

                <div class="form-group">
                    <label for="file">{{trans('equipment.owner_file_upload')}}</label>
                    <input type="file" name="file" class="form-control-file" id="file">
                </div>
                <button type="submit" class="btn btn-warning">{{trans('form-elements.add-btn')}}</button>
                <a class="btn btn-secondary" href="{{route('equipment-owner-show', ['eid' => $equipment->id, 'ocid' => $owner->id])}}">{{trans('form-elements.cancel-btn')}}</a>
            </form>
            @if($errors->any())
                @include('partials.errors')
            @endif

        </div>
    </div>
</div>

@endsection