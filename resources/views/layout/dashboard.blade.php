<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
    <!-- Alpine.js CDN -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body class=" w-screen">
    <div class="flex relative">
        <div class="flex h-screen w-16 flex-col justify-between border-e bg-white">
            <div>
                <div class="inline-flex size-16 items-center justify-center">
                    <span class="grid size-10 place-content-center rounded-lg bg-gray-100 text-xs text-gray-600">
                        L
                    </span>
                </div>

                <div class="border-t border-gray-100">
                    <div class="px-2">
                        <div class="py-4">
                            <div @click="open = !open"
                                class=" group relative flex justify-center rounded bg-blue-50 px-2 py-1.5 text-blue-700">
                                <svg width="30px" height="30px" viewBox="-2.4 -2.4 28.80 28.80" fill="none"
                                    xmlns="http://www.w3.org/2000/svg" stroke="#787878"
                                    stroke-width="0.00024000000000000003">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"
                                        stroke="#CCCCCC" stroke-width="0.144">
                                    </g>
                                    <g id="SVGRepo_iconCarrier">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M14 7C13.4477 7 13 7.44772 13 8V16C13 16.5523 13.4477 17 14 17H18C18.5523 17 19 16.5523 19 16V8C19 7.44772 18.5523 7 18 7H14ZM17 9H15V15H17V9Z"
                                            fill="#787878"></path>
                                        <path
                                            d="M6 7C5.44772 7 5 7.44772 5 8C5 8.55228 5.44772 9 6 9H10C10.5523 9 11 8.55228 11 8C11 7.44772 10.5523 7 10 7H6Z"
                                            fill="#787878"></path>
                                        <path
                                            d="M6 11C5.44772 11 5 11.4477 5 12C5 12.5523 5.44772 13 6 13H10C10.5523 13 11 12.5523 11 12C11 11.4477 10.5523 11 10 11H6Z"
                                            fill="#787878"></path>
                                        <path
                                            d="M5 16C5 15.4477 5.44772 15 6 15H10C10.5523 15 11 15.4477 11 16C11 16.5523 10.5523 17 10 17H6C5.44772 17 5 16.5523 5 16Z"
                                            fill="#787878"></path>
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M4 3C2.34315 3 1 4.34315 1 6V18C1 19.6569 2.34315 21 4 21H20C21.6569 21 23 19.6569 23 18V6C23 4.34315 21.6569 3 20 3H4ZM20 5H4C3.44772 5 3 5.44772 3 6V18C3 18.5523 3.44772 19 4 19H20C20.5523 19 21 18.5523 21 18V6C21 5.44772 20.5523 5 20 5Z"
                                            fill="#787878"></path>
                                    </g>
                                </svg>

                                <span
                                    class=" z-20 invisible absolute start-full top-1/2 ms-4 -translate-y-1/2 rounded bg-gray-900 px-2 py-1.5 text-xs font-medium text-white group-hover:visible">
                                    builder
                                </span>
                            </div>
                        </div>

                      
                    </div>
                </div>
            </div>

            <div class="sticky inset-x-0 bottom-0 border-t border-gray-100 bg-white p-2">
                <form action="/logout" method="POST">
                    @csrf
                    <button type="submit"
                        class="group relative flex w-full justify-center rounded-lg px-2 py-1.5 text-sm text-gray-500 hover:bg-gray-50 hover:text-gray-700">
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-5 opacity-75" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                        </svg>

                        <span
                            class="invisible absolute start-full top-1/2 ms-4 -translate-y-1/2 rounded bg-gray-900 px-2 py-1.5 text-xs font-medium text-white group-hover:visible">
                            Logout
                        </span>
                    </button>
                </form>
            </div>
        </div>

        <div 
            class=" z-10 flex h-screen flex-1 flex-col justify-between border-e bg-white">
            <div class="px-4 py-2  min-w-44">
                <ul class="mt-14 space-y-2 ">
                    <x-sub-heading>Pages</x-sub-heading>
                    
                    @foreach($pages as $page)
                    <li>
                        <a href="/dashboard/{{$project->id}}/pages/{{$page->id}}" class="block rounded-lg bg-gray-100 px-4 py-2 text-sm font-medium text-gray-700">
                            {{ $page->name}}
                        </a>
                    </li>
                    @endforeach
                    <li class="relative flex" x-data="{ showForm: false }" @click.away="showForm = false">
                        <a href="#" @click.prevent="showForm = !showForm"
                            class="block w-full rounded-lg border border-dashed border-onyx bg-gray-100 px-4 py-2 text-sm font-medium text-gray-700 text-center">
                            +
                        </a>
                        <form x-show="showForm" class="absolute ml-44 w-60 border border-silver bg-white rounded-md"
                            action="/dashboard/{{$project->id}}/pages" method="POST">

                            @csrf
                            <div class="space-y-6 flex flex-col p-4">
                                <x-form-input type="text" id="name" name="name" placeholder="create new page" required />
                                <x-form-button-primary>Save</x-form-button-primary>
                            </div>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
        <div class="w-full">
            @yield('content-builder')
        </div>
    </div>
</body>

</html>