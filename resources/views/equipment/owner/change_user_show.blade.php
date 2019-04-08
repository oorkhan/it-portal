@extends('layouts.app')
@section('title', 'Owner change show')
@section('content')

<div class="container">
    <div class="row">
        <div class="col">
            <h2>{{trans('equipment.user_change')}}</h2>
            <table class="table table-bordered">
                <tr>
                    <td style="width: 25%">{{trans('equipment.type')}}</td>
                    <td>{{$equipment->equipmenttype->name}}</td>
                </tr>
                <tr>
                    <td>{{trans('equipment.model')}}</td>
                    <td>{{$equipment->model}}</td>
                </tr>
                <tr>
                    <td>{{trans('equipment.serial')}}</td>
                    <td>{{$equipment->serial}}</td>
                </tr>
                <tr>
                    <td>{{trans('equipment.inventory_no')}}</td>
                    <td>{{$equipment->inventory_no}}</td>
                </tr>
                <tr>
                    <td>{{trans('equipment.owner_give')}}</td>
                    <td>{{$prevOwner->name}}</td>
                </tr>
                <tr>
                    <td>{{trans('equipment.owner_take')}}</td>
                    <td>{{$nextOwner->name}}</td>
                </tr>
                <tr>
                    <td>{{trans('equipment.owner_change_date')}}</td>
                    <td>{{$equipmentOwner->created_at}}</td>
                </tr>
            </table>
            @if(count($equipmentOwner->files)>=1)
            <div>
                <h3>{{trans('equipment.owner_files')}}</h3>
                <ol>
                    @foreach($equipmentOwner->files as $file)
                        <li>
                            <a target="_blank" href="{{Storage::url($file->url)}}">{{$file->description}}</a> |

                            <a class="text-danger" onclick="if(confirm('Are you sure?')){$('#fileDeleteForm{{$file->id}}').submit()}" href="#">
                                {{trans('equipment.file_delete')}}
                            </a>
                            <form method="post" action="{{route('owner-file-delete', ['fid' => $file->id])}}" id="fileDeleteForm{{$file->id}}">
                                @csrf
                                @method('DELETE')
                            </form>
                        </li>
                    @endforeach
                </ol>
            </div>
            @else <h3>{{trans('equipment.no_files')}}</h3>
            @endif
            <a class="btn btn-secondary" href="{{$equipment->path('show')}}">{{trans('form-elements.back_btn')}}</a>
            <a class="btn btn-success" href="{{route('equipment-owner-add-file', ['eid' => $equipment->id, 'ocid' => $equipmentOwner->id])}}">{{trans('equipment.add_file')}}</a>
            <a class="btn btn-warning" href="{{route('equipment-owner-edit', ['eid' => $equipmentOwner->equipment->id, 'coid' => $equipmentOwner->id])}}">{{trans('form-elements.edit-btn')}}</a>
            <button class="btn-danger btn" onclick="if(confirm('Are you sure?')){$('#deleteForm').submit()}">
                {{trans('form-elements.delete-btn')}}
                <form method="post" action="{{route('equipment-owner-delete', ['eid' => $equipment->id, 'cid' => $equipmentOwner->id ])}}" id="deleteForm">
                    @csrf
                    @method('DELETE')
                </form>
            </button>
            @if(session('message'))
                @include('partials.message')
            @endif
        </div>
    </div>
</div>

@endsection