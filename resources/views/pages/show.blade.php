@extends('layout.dashboard')

@section('pages-content')
<div class="flex  justify-between">
    <div class="m-4 flex-col">
        <h1 class="text-xl font-bold tracking-tighter">{{$project->name}} > {{$page->name}}</h1>
        <div class="flex justify-center font-display tracking-tight flex-col space-y-8 items-center px-8 py-4 ">
            <x-create-component-card :project="$project" :page="$page"></x-create-component-card>
            <x-show-component-cards :components="$components"></x-show-component-cards>
            
        </div>
    </div>
    <div class=" max-md:hidden right-0 border border-s-2 ">
        <div class="px-4 py-2 min-w-44">
            <h2>Api end point</h2>
            <p class="block rounded-lg shadow-sm hover:bg-gray-100 border bg-gray-200 px-4 py-2 text-sm font-medium text-gray-700 copy-to-clipboard"
            data-clipboard-text="{{url('/api/pages/'.$page->slug)}}"
            >
            {{url('/api/pages/'.$page->slug)}}
            </p>
        </div>
        <div class="px-4 py-2 min-w-44">
            <h2>Api key</h2>
            <p class="block rounded-lg shadow-sm hover:bg-gray-100 border bg-gray-200 px-4 py-2 text-sm font-medium text-gray-700 copy-to-clipboard"
                data-clipboard-text="{{$project->api_key}}">
                {{$project->api_key}}
            </p>
        </div>
    </div>
</div>

@endsection