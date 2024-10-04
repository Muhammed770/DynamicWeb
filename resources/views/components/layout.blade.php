<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@200..800&display=swap" rel="stylesheet">
    <title>DynamicWeb</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>

<body class="dark:bg-onyx dark:text-silver bg-silver text-onyx font-display font-bold ">
    <nav class='flex items-center justify-between bg-slate text-silver rounded-lg p-4 mx-12 my-4'>
        <a href="/" class="flex space-x-6 items-center">
            <image src="{{Vite::asset('resources/images/dynamicweb_logo_lg.svg')}}" alt="logo" />
            <h2 class="text-xl bg-gradient-to-r  from-silver to-sand bg-clip-text text-transparent">
                DynamicWeb
            </h2>
        </a>
        <div class="flex space-x-4 items-center">
            <x-nav-link href="/">Home</x-nav-link>
            <x-nav-link href="/about">About</x-nav-link>
            <x-button-primary :isDynamic="false">Login</x-button-primary>
        </div>
    </nav>
    <main>
        {{ $slot}}
    </main>
</body>

</html>