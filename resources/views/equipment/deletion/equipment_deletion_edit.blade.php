@extends('layouts.app')
@section('title', '')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col">
                <h3>{{trans('equipment.deletion')}}</h3>
                <form action="{{route('equipment-deletion-update', ['id' => $equipment->id, 'did' => $deletion->id])}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('patch')
                    <div class="form-group">
                        <label for="delDescription">{{trans('equipment.deletion_description')}}</label>
                        <input type="text" class="form-control" id="delDescription" name="del_description" value="{{$deletion->del_description ?? old('del_description')}}">
                    </div>
                    <div class="form-group">
                        <label for="delDate">{{trans('equipment.del_date')}}</label>
                        <input id="delDate" type="date" class="form-control" name="del_date" value="{{$deletion->del_date ?? old('del_date')}}">
                    </div>
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