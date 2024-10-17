<!DOCTYPE html>
<html lang="en" class='h-full '>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Projects</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
    <!-- Alpine.js CDN -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@200..800&display=swap" rel="stylesheet">
</head>

<body class="text-onyx font-display font-bold h-full">
    <div class="min-h-full">
        <x-layout>

            <main>
                <div class="flex justify-center items-center w-screen">

                    <div class=" mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                        @yield('projects')
                    </div>
                </div>
            </main>
        </x-layout>
    </div>
</body>

</html>