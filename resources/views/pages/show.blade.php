@extends('layout.dashboard')

@section('pages-content')
<div class="m-4">
    <h1 class="text-xl font-bold tracking-tighter">{{$project->name}} > {{$page->name}}</h1>
    <div class="flex justify-center font-display tracking-tight flex-col space-y-8 items-center px-8 py-4 ">
        <x-create-component-card :project="$project" :page="$page"></x-create-component-card>
        <x-show-component-cards :components="$components"></x-show-component-cards>
    </div>
</div>

@endsection