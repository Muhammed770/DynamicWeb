@extends('layout.projects')

@section('projects')


<div class="grid md:grid-cols-2 lg:grid-cols-3 gap-4 p-8">
    <x-create-project-card></x-create-project-card>
    @if($projects->isNotEmpty())
    @foreach ($projects as $project )
    <x-project-card :project="$project"></x-project-card>
    @endforeach
    @endif

</div>

@endsection