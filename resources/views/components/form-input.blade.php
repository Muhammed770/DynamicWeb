@props(['id'=>'hs-floating-gray-input-email',
'placeholder'=>''])
<div class="relative">
    <input id={{$id}} {{$attributes->merge(['class'=>'peer p-4 block w-full bg-gray-100 border-transparent rounded-lg text-sm placeholder:text-transparent
    focus:outline-none
    focus:border-slate focus:ring-slate disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-700
    dark:border-transparent dark:text-neutral-400 dark:focus:ring-slate
    focus:pt-6
    focus:pb-2
    [&:not(:placeholder-shown)]:pt-6
    [&:not(:placeholder-shown)]:pb-2
    autofill:pt-6
    autofill:pb-2'])}} placeholder={{$placeholder}} >
    <label for={{$id}}
        class="absolute top-0 start-0 p-4 h-full text-sm truncate pointer-events-none transition ease-in-out duration-100 border border-transparent  origin-[0_0] peer-disabled:opacity-50 peer-disabled:pointer-events-none
      peer-focus:scale-90
      peer-focus:translate-x-0.5
      peer-focus:-translate-y-1.5
      peer-focus:text-gray-500 dark:peer-focus:text-neutral-500
      peer-[:not(:placeholder-shown)]:scale-90
      peer-[:not(:placeholder-shown)]:translate-x-0.5
      peer-[:not(:placeholder-shown)]:-translate-y-1.5
      peer-[:not(:placeholder-shown)]:text-gray-500 dark:peer-[:not(:placeholder-shown)]:text-neutral-500 dark:text-neutral-500">{{$placeholder}}</label>
      @error($id)
        <p class="text-red-500 dark:text-red-500 ml-1 text-xs mt-1">{{$message}}</p>
      @enderror
</div>