@extends('layout.dashboard')

@section('content-builder')
<div class='flex justify-center'>
    <div class="flex flex-col space-y-8  px-8 py-4 ">
        <h1 class="text-3xl font-bold text-center tracking-tighter">Content Builder</h1>
        <x-form-input type="text" id="title" name="title" placeholder="Title" required/>
        <x-form-input type="text" id="content" name="content" placeholder="Content" required/>
        <x-form-button-primary>Save</x-form-button-primary>
    </div>
</div>
@endsection