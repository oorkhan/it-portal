@extends('layouts.app')
@section('title', 'Owner change show')
@section('content')

<div class="container">
    <div class="row">
        <div class="col">
            <div>{{$equipment->equipmenttype->name}}</div>
            <div>{{$equipment->model}}</div>
            <div>{{$equipment->serial}}</div>
            <div>{{$equipment->inventory_no}}</div>
            <div>Owner changed</div>
            <div>from {{$prevOwner->name}} to {{$nextOwner->name}}, date: {{$equipmentOwner->created_at}}</div>
            <div>
                <ul>
                    @foreach($equipmentOwner->files as $file)
                        <li><a target="_blank" href="<?=asset($file->url)?>">file</a></li>
                    @endforeach
                </ul>
            </div>
            <a class="btn btn-secondary" href="{{$equipment->path('show')}}">{{trans('form-elements.back-btn')}}</a>
            <button class="btn-danger btn-sm btn" onclick="if(confirm('Are you sure?')){$('#deleteForm').submit()}">
                {{trans('form-elements.delete-btn')}}
                <form method="post" action="{{route('equipment-owner-delete', ['eid' => $equipment->id, 'cid' => $equipmentOwner->id ])}}" id="deleteForm">
                    @csrf
                    @method('DELETE')
                </form>
            </button>
        </div>
    </div>
</div>

@endsection