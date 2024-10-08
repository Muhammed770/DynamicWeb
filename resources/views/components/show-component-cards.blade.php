<div class="flex max-w-4xl flex-col w-full">
    @if($components->isNotEmpty())

    <div class="space-y-4 ">

        @foreach ($components as $component)
        <div class="border rounded-lg p-4   gap-4">
            @if ($component->type == 'text')
            <div>
                <label class="block text-sm font-medium text-gray-700">Text Field</label>
                <input type="text" name="text_components[]" class="block w-full p-2 border rounded-lg"
                    placeholder="Enter text here" value="{{$component->content}}">
            </div>
            @elseif ($component->type == 'textarea')
            <div>
                <label class="block text-sm font-medium text-gray-700">Text Area</label>
                <textarea name="textarea_components[]" class="block w-full p-2 border rounded-lg"
                    placeholder="Enter text here" >{{$component->content}}</textarea>
            </div>
            @elseif ($component->type == 'image')
            <div>
                <img src="{{asset('storage/'.$component->content)}}" alt="image">
            </div>
            @elseif ($component->type == 'date')
            <div>
                <label class="block text-sm font-medium text-gray-700">Select Date</label>
                <input type="date" name="date_components[]" class="block w-full p-2 border rounded-lg"
                    value="{{$component->content}}">
            </div>
            @endif
        </div>
        @endforeach
    </div>

    @endif
</div>