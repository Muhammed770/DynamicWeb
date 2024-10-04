@props(['isDynamic' => false])

@if($isDynamic)
<div class="bg-gradient-to-br from-onyx to-slate dark:from-sand dark:to-silver rounded-lg overflow-clip">
    <button
        class="bg-gradient-to-r  dark:from-onyx dark:to-coffee from-silver to-sand  bg-clip-text text-transparent  px-4 py-2">
        {{ $slot }}
    </button>
</div>
@else
<div class="bg-gradient-to-br from-onyx to-slate hover:from-slate hover:to-onyx rounded-lg overflow-clip">
    <button class="bg-gradient-to-r  from-silver to-sand  bg-clip-text text-transparent  px-4 py-2">
        {{ $slot }}
    </button>
</div>
@endif