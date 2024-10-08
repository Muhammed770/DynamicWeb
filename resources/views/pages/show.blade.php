@extends('layout.dashboard')

@section('pages-content')
<div class="m-4">
    <h1 class="text-xl font-bold tracking-tighter">{{$project->name}} > {{$page->name}}</h1>
    <x-create-component-card :project="$project" :page="$page"></x-create-component-card>
</div>

@endsection