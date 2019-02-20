@component('mail::message')
New project: {{$project->title}}

{{$project->description}}

@component('mail::button', ['url' => url($project->path())])
View
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
