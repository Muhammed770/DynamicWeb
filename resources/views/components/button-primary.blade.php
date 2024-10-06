@props(['isDynamic' => false, 'href' => '#'])

@if($isDynamic)
<a href="{{$href}}"
    class=" rounded-lg overflow-clip px-4 py-2 bg-onyx hover:bg-black border-slate hover:border-gray-700 border dark:bg-pearl dark:text-onyx dark:hover:bg-silver">
    <div class=" ">
        {{ $slot }}
    </div>
</a>
@else
<a href="{{$href}}" class=" rounded-lg overflow-clip px-4 py-2 bg-onyx hover:bg-black border-slate hover:border-gray-700 border ">
    <div  class=" ">
        {{ $slot }}
    </div>
</a>
@endif