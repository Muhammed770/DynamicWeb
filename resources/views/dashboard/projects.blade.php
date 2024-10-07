@extends('layout.projects')

@section('projects')
<div class="grid grid-cols-3 gap-4 p-8">
    @if($projects->isNotEmpty())
    @foreach ($projects as $project )
    <x-project-card :project="$project"></x-project-card>
    @endforeach
    @endif
    <x-create-project-card></x-create-project-card>
</div>
@endsection