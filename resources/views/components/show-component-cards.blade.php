<div class="flex max-w-4xl flex-col w-full">
    @if($components->isNotEmpty())

    <div class="space-y-4 ">

        @foreach ($components as $component)
        <div class="border rounded-lg p-4   gap-4">
            @php
            $content = json_decode($component->content);
            @endphp
            @if ($component->type == 'text')
            <div>
                <label class="block text-sm font-medium text-gray-700">Title</label>
                <input type="text" x-model="component.title" name='text_titles[]'
                    class="block w-full p-2 border rounded-lg" value="{{$content->title ?? ''}}"
                    placeholder="Enter title here">

                <label class="block text-sm font-medium text-gray-700">Text Field</label>
                <input type="text" x-model="component.content" name="text_contents[]"
                    class="block w-full p-2 border rounded-lg" value="{{$content->text ?? ''}}"
                    placeholder="Enter text here">
            </div>
            @elseif ($component->type == 'textarea')
            <div>
                <label class="block text-sm font-medium text-gray-700">Title</label>
                <input type="text" x-model="component.title" name='textarea_titles[]' class="block w-full p-2 border rounded-lg"
                value="{{$content->title ?? ''}}"    
                placeholder="Enter title here">
            
                <label class="block text-sm font-medium text-gray-700">Text Area</label>
                <textarea name="textarea_contents[]" class="block w-full p-2 border rounded-lg"
                    placeholder="Enter text here">
                    {{$content->text ?? ''}}
                </textarea>
            </div>
            @elseif ($component->type == 'image')
            <div>
                <!-- Title -->
                <label class="block text-sm font-medium text-gray-700">Title</label>
                <input type="text" x-model="component.name" name="image_titles[]" class="block w-full p-2 border rounded-lg"
                value="{{$content->title ?? ''}}"    
                placeholder="Enter image title here">
                <div class="flex flex-col items-center">

                    <image src="{{asset($content->path)}}" alt="image" class="w-1/2 h-1/2">
                </div>
                
            
                <!-- Caption -->
                <label class="block text-sm font-medium text-gray-700">Caption</label>
                <input type="text" x-model="component.caption" name="image_captions[]" class="block w-full p-2 border rounded-lg"
                value="{{$content->caption ?? ''}}"   
                placeholder="Enter image caption here">
            
            </div>
            @elseif ($component->type == 'date')
            <div>
                <label class="block text-sm font-medium text-gray-700">Title</label>
                    <input type="text" x-model="component.title" name='date_titles[]' class="block w-full p-2 border rounded-lg"
                    value="{{$content->title ?? ''}}"    
                    placeholder="Enter title here">
                <label class="block text-sm font-medium text-gray-700">Select Date</label>
                <input type="date" name="date_components[]" class="block w-full p-2 border rounded-lg"
                    value="{{$content->date ?? ''}}">
            </div>
            @endif
        </div>
        @endforeach
    </div>

    @endif
</div>