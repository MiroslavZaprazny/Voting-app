<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Voting app</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans bg-gray-background text-gray-900 text-sm">
    <header class="flex items-center justify-between px-8 py-4">
        <a href="#"><img src="{{ asset('img/logo.svg') }}" alt="Logo"></a>
        <div class="flex items-center">
            @if (Route::has('login'))
                <div class="px-6 py-4">
                    @auth
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <a href="{{route('logout')}}"
                                onclick="event.preventDefault();
                                            this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </a>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log
                            in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}"
                                class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
            <a href="#">
                <img src="https://www.gravatar.com/avatar/000000000000000000000000000?d=mp" alt="avatar"
                    class="rounded-full w-10 h-10">
            </a>
        </div>
    </header>
    <main class="container mx-auto flex max-w-custom">
            <div class="mr-5 w-70">
               add idea form Lorem, ipsum dolor sit amet consectetur adipisicing elit. Possimus impedit reprehenderit voluptatibus rerum ea! Ipsa quis amet fugit, veniam dolores reiciendis sequi enim. Consectetur veritatis inventore ipsam earum provident deserunt!
            </div>
            <div class="w-175">
               <nav class="flex item-center justify-between text-xs">
                    <ul class="flex uppercase font-semibold border-gray-300 border-b-4 pb-3 rounded">
                        <li>
                            <a class="border-b-4 pb-3 border-blue" href="#">
                             All ideas
                            </a>
                            <a class="ml-5 text-gray-400 hover:border-blue border-gray-300 border-b-4 pb-3 transition ease-in-out duration-150" href="#">
                                Considering
                            </a>
                            <a class="ml-5 text-gray-400 hover:border-blue border-gray-300 border-b-4 pb-3 transition ease-in-out duration-150" href="#">
                                In progress
                            </a>
                        </li>
                    </ul>

                    <ul class="flex uppercase font-semibold border-gray-300 border-b-4 pb-3 rounded">
                        <li>
                            <a class="text-gray-400 hover:border-blue border-gray-300 border-b-4 pb-3 transition ease-in-out duration-150" href="#">
                                Implemented
                            </a>
                            <a class="ml-5 text-gray-400 hover:border-blue border-gray-300 border-b-4 pb-3 transition ease-in-out duration-150" href="#">
                                Closed
                            </a>
                        </li>
                    </ul>
               </nav>
               <div class="mt-8">
                    {{$slot}}
               </div>
            </div>
    </main>
</body>
</html>
