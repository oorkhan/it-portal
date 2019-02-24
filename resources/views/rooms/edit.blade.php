@extends('layouts.app')
@section('title', 'Edit '.$room->name)
@section('content')

    <div class="container">
        <div class="row">
            <div class="col">
                <form action="{{$room->path()}}" method="post">
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                        <label for="roomName">{{trans('rooms.name')}}</label>
                        <input type="text" class="form-control" id="roomName" name="name" value="{{old('name') ? old('name') : $room->name}}">
                    </div>
                    @if(count($campuses) >=1)
                        <div class="form-group">
                            <label for="inputState">{{trans('campuses.campus')}}</label>
                            <select id="inputState" class="form-control" name="campus_id">
                                @foreach($campuses as $campus)
                                    <option {{old('campus_id') == $campus->id ? 'selected': ''}} {{$room->campus_id == $campus->id ? 'selected' : ''}} value="{{$campus->id}}"> {{$campus->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    @endif
                    <div class="form-group">
                        <label for="inputState">{{trans('rooms.type')}}</label>
                        <select id="inputState" class="form-control" name="type">
                            <option {{old('type') == 'office' ? 'selected': ''}} {{$room->type == 'office' ? 'selected' : ''}} value="office">Office</option>
                            <option {{old('type') == 'classroom' ? 'selected': ''}} {{$room->type == 'classroom' ? 'selected' : ''}} value="classroom">Classroom</option>
                            <option {{old('type') == 'library' ? 'selected': ''}} {{$room->type == 'library' ? 'selected' : ''}} value="library">Library</option>
                            <option {{old('type') == 'storage' ? 'selected': ''}} {{$room->type == 'storage' ? 'selected' : ''}} value="storage">Storage</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="example-number-input">{{trans('rooms.number-of-people')}}</label>
                        <input name="numberOfPeople" class="form-control" min="0" value="{{$room->numberOfPeople}}" type="number" id="example-number-input">
                    </div>
                    <button type="submit" class="btn btn-warning">{{trans('form-elements.update-btn')}}</button>
                    <a class="btn btn-secondary" href="/rooms">{{trans('form-elements.cancel-btn')}}</a>
                </form>
                @if($errors->any())
                    @include('partials.errors')
                @endif

            </div>
        </div>
    </div>

@endsection