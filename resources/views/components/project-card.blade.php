<a
    href="/projects/{{$project->id}}/pages"
    class="flex flex-col h-48 overflow-hidden bg-white border shadow-sm rounded-xl">
    <div class="p-4  space-y-2">
        <h1 class="text-3xl font-bold tracking-tighter">
            {{$project->name}}
        </h1>
        <span class="bg-gray-100 rounded-full px-3 py-1 text-sm font-semibold text-gray-600">
            {{$project->link }} 
        </span>
        <p class="mt-2 text-gray-700 line-clamp-3">
            {{$project->description}}
        </p>
    </div>
</a>