@extends('layouts.app')
@section('title', 'Deletion file create')
@section('content')

<div class="container">
    <div class="row">
        <div class="col">
            <form action="{{route('deletion-file-update', ['id'=>$deletion->id, 'fid' => $file->id])}}" method="post">
                @csrf
                @method('patch')
                <div class="form-group">
                    <label for="description">{{trans('equipment.delete_file_description')}}</label>
                    <input type="text" name="del_file_description" class="form-control" id="description" value="{{old('del_file_description')?? $file->del_file_description}}">
                </div>

                <button type="submit" class="btn btn-warning">{{trans('form-elements.update-btn')}}</button>
                <a class="btn btn-secondary" href="{{$deletion->path('show', $deletion->equipment->id)}}">{{trans('form-elements.cancel-btn')}}</a>
            </form>
            @if($errors->any())
                @include('partials.errors')
            @endif
        </div>
    </div>
</div>
@endsection