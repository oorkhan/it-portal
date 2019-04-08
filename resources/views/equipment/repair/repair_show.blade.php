@extends('layouts.app')
@section('title', 'Repair Show')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col">
                <h2>{{trans('equipment.repair_info')}}</h2>
                <table class="table table-bordered">
                    <tr>
                        <td style="width: 30%">{{trans('equipment.type')}}</td>
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
                        <td>{{trans('equipment.repair_description')}}</td>
                        <td>{{$repair->description}}</td>
                    </tr>
                    <tr>
                        <td>{{trans('equipment.repair_company')}}</td>
                        <td>{{$repair->company}}</td>
                    </tr>
                    <tr>
                        <td>{{trans('equipment.repair_status')}}</td>
                        <td>{{$repair->is_repaired ? 'repaired' : '<b>not repaired'}}</td>
                    </tr>
                    <tr>
                        <td>{{trans('equipment.repair_start')}}</td>
                        <td>{{$repair->repair_start}}</td>
                    </tr>
                    @if($repair->repair_finish !== null)
                        <tr>
                            <td>{{trans('equipment.repair_finish')}}</td>
                            <td>{{$repair->repair_finish}}</td>
                        </tr>
                    @endif
                </table>

                @if(count($repair->files)>=1)
                <div>
                    <h4>{{trans('equipment.repair_files')}}</h4>
                    <ol>
                        @foreach($repair->files as $file)
                            <li>
                                <a target="_blank" href="{{Storage::url($file->url)}}">{{$file->description}}</a> |
                                <a class="text-danger" onclick="if(confirm('Are you sure?')){$('#fileDeleteForm').submit()}" href="#">{{trans('equipment.file_delete')}}</a>
                                <form method="post" action="{{route('repair-file-delete', ['rid' => $repair->id, 'fid' => $file->id])}}" id="fileDeleteForm">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </li>
                        @endforeach
                    </ol>
                </div>
                @endif
                <a class="btn btn-warning" href="{{route('equipment-repair-edit', ['eid' => $equipment->id, 'rid' => $repair->id])}}">{{trans('form-elements.edit-btn')}}</a>
                <a class="btn btn-success" href="{{route('equipment-repair-file-create', ['rid' => $repair->id])}}">{{trans('equipment.add_file')}}</a>

                <button class="btn-danger btn" onclick="if(confirm('Are you sure?')){$('#deleteForm').submit()}">
                    {{trans('form-elements.delete-btn')}}
                    <form method="post" action="{{route('equipment-repair-delete', ['eid' => $equipment->id, 'rid' => $repair->id])}}" id="deleteForm">
                        @csrf
                        @method('DELETE')
                    </form>
                </button>
                <a class="btn btn-secondary" href="{{$equipment->path('show')}}">{{trans('form-elements.cancel-btn')}}</a>
            </div>
        </div>
    </div>

@endsection