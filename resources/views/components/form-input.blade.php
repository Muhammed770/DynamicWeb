@props(['id'=>'hs-floating-gray-input-email',
'placeholder'=>''])

<div >
  <label for={{$id}} class="block text-sm font-medium mb-2 ">{{$placeholder}}</label>
  <input id={{$id}} {{$attributes->merge(['class'=>'py-3 px-4 bg-pearl block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none '])}} placeholder={{$placeholder}}>
    @error($id)
    <p class="text-red-500 dark:text-red-500 ml-1 text-xs mt-1">{{$message}}</p>
    @enderror
</div>