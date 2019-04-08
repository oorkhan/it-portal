@extends('layouts.app')
@section('title', 'Equipment deletion show')
@section('content')

<div class="container">
    <div class="row">
        <div class="col">
            <h3>
                {{trans('equipment.deletion_header')}} <br>
                {{$equipment->equipmenttype->name}}: {{$equipment->model}}
            </h3>
            @if(session('message'))
                @include('partials.message')
            @endif
            <div>
                <a class="btn btn-secondary btn-sm" href="{{route('equipment-index')}}">{{trans('form-elements.back-to-list')}}</a>
                <a class="btn btn-success btn-sm" href="{{route('deletion-file-create', ['did' => $deletion->id])}}">{{trans('form-elements.add_file')}}</a>
                <a class="btn btn-warning btn-sm" href="{{route('equipment-deletion-edit', ['eid' => $equipment->id, 'did' => $deletion->id])}}">{{trans('form-elements.update-btn')}}</a>
                <a onclick="if(confirm('Are you sure?')){$('#deleteForm').submit()}" class="btn btn-danger btn-sm" href="#">
                    {{trans('equipment.remove_delete_record')}}
                </a>
                <form method="post" id="deleteForm" action="{{route('equipment-deletion-delete', ['eid' => $equipment->id, 'did' => $deletion->id])}}">
                    @csrf
                    @method('delete')
                </form>
            </div>
           <div>
               <p>
               <h4>{{trans('equipment.del_date')}}: {{$deletion->del_date}}</h4>
                   <h4>{{trans('equipment.del_description')}}</h4>
               {{$deletion->del_description}}
               </p>
               <h4>{{trans('equipment.deletion_files')}}</h4>
               @if(count($deletion->files)>=1)
                   <table class="table">
                       <thead>
                       <tr>
                           <th scope="col">{{trans('equipment.file_description')}}</th>
                           <th scope="col">{{trans('equipment.file_link')}}</th>
                           <th scope="col">{{trans('equipment.file_edit')}}</th>
                           <th scope="col">{{trans('equipment.file_delete')}}</th>
                       </tr>
                       </thead>
                       <tbody>
                   @foreach($deletion->files as $file)
                       <tr>
                           <td>{{$file->del_file_description}}</td>
                           <td><a target="_blank" href="{{Storage::url($file->url)}}">{{trans('equipment.file_download')}}</a></td>
                           <td><a href="{{route('deletion-file-edit', ['did' => $deletion->id, 'fid' => $file->id])}}">{{trans('equipment.file_edit')}}</a></td>
                           <td>
                               <a href="#" class="text-danger" onclick="if(confirm('Are you sure?')){$('#deleteForm').submit()}">{{trans('equipment.file_delete')}}</a>
                               <form method="post" id="deleteForm" action="{{route('deletion-file-destroy', ['fid' => $file->id])}}">
                                   @csrf
                                   @method('delete')
                               </form>
                           </td>

                       </tr>
                   @endforeach
                       </tbody>
                   </table>
                @endif
           </div>
        </div>
    </div>
</div>

@endsection