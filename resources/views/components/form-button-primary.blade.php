@props(['theme'=>'default'])

@php
$themeClasses = [
'default' => 'rounded-lg overflow-clip px-4 py-2 bg-onyx hover:bg-black border-slate text-silver hover:border-gray-700
border',
'light' => 'rounded-lg overflow-clip px-4 py-2 bg-onyx hover:bg-black border-slate text-silver hover:border-gray-700
border',
'dark' => 'rounded-lg overflow-clip px-4 py-2 border-slate hover:border-gray-700
border dark:bg-pearl dark:text-onyx dark:hover:bg-silver'];
@endphp
<button class="{{$themeClasses[$theme]}}">
    {{ $slot }}
</button>