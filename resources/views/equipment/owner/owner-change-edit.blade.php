@extends('layouts.app')
@section('title', 'edit owner change')
@section('content')

<div class="container">
    <div class="row">
        <div class="col">
            <form action="{{route('equipment-owner-update', ['eid' =>$equipment->id, 'ocid' => $owner->id])}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('patch')
                @if(count($users) >=1)
                <div class="form-group">
                    <label>{{trans('equipment.owner_give')}}: {{$equipment->user->name}}</label>
                    <input type="hidden" name="prev_user_id" value="{{$equipment->user->id}}">
                </div>

                    <div class="form-group">
                        <label for="oldUser">{{trans('equipment.owner_take')}}</label>{{$owner->prev_user_id}}
                        <select id="oldUser" class="form-control" name="prev_user_id">
                            <option selected>{{trans('form-elements.select-default')}}</option>
                            @foreach($users as $user)
                                <option {{$owner->prev_user_id == $user->id ? 'selected': ''}} value="{{$user->id}}"> {{$user->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="newUser">{{trans('equipment.next_user')}}</label>
                        <select id="newUser" class="form-control" name="next_user_id">
                            <option selected>{{trans('form-elements.select-default')}}</option>
                            @foreach($users as $user)
                                <option {{$owner->next_user_id == $user->id ? 'selected': ''}} value="{{$user->id}}"> {{$user->name}}</option>
                            @endforeach
                        </select>
                    </div>
                @endif
                <button type="submit" class="btn btn-warning">{{trans('form-elements.update-btn')}}</button>
                <a class="btn btn-secondary" href="{{route('equipment-show', ['id' => $equipment->id])}}">
                    {{trans('form-elements.cancel-btn')}}
                </a>
            </form>
            @if($errors->any())
                @include('partials.errors')
            @endif
        </div>
    </div>
</div>

@endsection