@props(['href'=>'#'])
<a href="{{$href}}" {{$attributes->merge(['class' => 'text-xl text-silver'])}}>
        {{$slot}}
</a>