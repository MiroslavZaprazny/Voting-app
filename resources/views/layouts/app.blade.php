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
    @livewireStyles
</head>

<body class="font-sans bg-gray-background text-gray-900 text-sm">
    <header class="flex flex-col md:flex-row items-center justify-between px-8 py-4">
        <a href="/"><img src="{{ asset('img/logo.svg') }}" alt="Logo"></a>
        <div class="flex items-center mt-2 md:mt-0">
            @if (Route::has('login'))
                <div class="px-6 py-4">
                    @auth
                        <div class="flex items-center space-x-4">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                            this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </a>
                            </form>
                            <div x-data="{ isOpen: false }"
                                class="relative">
                                <button
                                    @click="isOpen = !isOpen"
                                    >
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-700" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                                    </svg>
                                </button>
                                    <div class="absolute flex justify-center items-center w-4 h-4 rounded-full bg-red text-white text-xxs"
                                        style="top: -4px; right: -4px;">
                                        8
                                    </div>
                                    <ul x-cloak x-show="isOpen" 
                                    x-transition.origin.top.duration.200ms
                                        @click.away="isOpen = false"
                                        class="absolute w-70 md:w-96 max-h-128 overflow-y-auto text-left bg-white shadow-dialog rounded-xl
                                            z-10 md:ml-8 top-10 md:top-8 -right-20 md:right-2">
                                        <li>
                                            <a @click="
                                        isOpen=false
                                    "
                                                href="#"
                                                class="flex hover:bg-gray-100 transition duration-150 ease-in px-5 py-3">
                                                <img src="https://www.gravatar.com/avatar/000000000000000000000000000?d=mp"
                                                    alt="avatar" class="rounded-full w-10 h-10">
                                                <div class="ml-4">
                                                    <div>
                                                        <span class="font-semibold">
                                                            Mirko
                                                        </span>
                                                        <span>
                                                            commented on
                                                        </span>
                                                        <span class="font-semibold">
                                                            'tvoj tato'
                                                        </span>

                                                        <span class="line-clamp-3">
                                                            "Lorem ipsum dolor sit amet consectetur adipisicing elit. Eum,
                                                            facere quas sed expedita fuga vero excepturi, commodi sint quod,
                                                            sunt veniam corrupti maiores quasi repudiandae porro.
                                                            Reprehenderit porro temporibus vitae ipsum harum tempore sit,
                                                            sequi beatae. Nesciunt voluptatum in, maiores dicta quis
                                                            consequuntur mollitia quibusdam iste nam fuga facere at rem
                                                            illum, aliquam, perspiciatis obcaecati minus assumenda dolor
                                                            ratione eius debitis non. Culpa distinctio, incidunt quos
                                                            labore, perferendis vero quam earum modi architecto sequi
                                                            blanditiis. Dicta accusamus, fugiat suscipit iusto ea ab
                                                            asperiores est temporibus autem quis ducimus reprehenderit esse
                                                            cupiditate! Ullam molestias eveniet magni recusandae, rerum
                                                            similique delectus omnis?"
                                                        </span>

                                                    </div>
                                                    <div class="text-xs text-gray-500 mt-1">
                                                        1 hour ago
                                                    </div>
                                                </div>
                                            </a>
                                        </li>

                                        <li>
                                            <a @click="
                                                isOpen=false
                                            "
                                                href="#"
                                                class="flex hover:bg-gray-100 transition duration-150 ease-in px-5 py-3">
                                                <img src="https://www.gravatar.com/avatar/000000000000000000000000000?d=mp"
                                                    alt="avatar" class="rounded-full w-10 h-10">
                                                <div class="ml-4">
                                                    <div>
                                                        <span class="font-semibold">
                                                            Mirko
                                                        </span>
                                                        <span>
                                                            commented on
                                                        </span>
                                                        <span class="font-semibold">
                                                            "lorem ipsum"
                                                        </span>

                                                    </div>
                                                    <div class="text-xs text-gray-500 mt-1">
                                                        1 hour ago
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="border-t border-gray-300 text-center">
                                            <button class="w-full block font-semibold hover:bg-gray-100 transition ease-in duration-150 py-4">
                                                Mark all as read
                                            </button>
                                        </li>
                                    </ul>
                            </div>
                        </div>
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
            @auth
                <a href="#">
                    <img src="{{ auth()->user()->getAvatar() }}" alt="avatar" class="rounded-full w-10 h-10">
                </a>
            @else
                <a href="#">
                    <img src="https://www.gravatar.com/avatar/000000000000000000000000000?d=mp" alt="avatar"
                        class="rounded-full w-10 h-10">
                </a>
            @endauth
        </div>
    </header>
    <main class="container mx-auto flex max-w-custom flex-col md:flex-row">
        <div class="md:mr-5 md:mx-0 w-70 mx-auto">
            <div style="
                border-image-source: linear-gradient(to bottom, rgba(50, 138, 241, 0.22), rgba(99, 123, 255, 0));
                border-image-slice: 1;
                background-image: linear-gradient(to bottom, #ffffff, #ffffff), linear-gradient(to bottom, rgba(50, 138, 241, 0.22), rgba(99, 123, 255, 0));
                background-origin: border-box;
                background-clip: content-box, border-box;"
                class="border-2 bg-white border-blue rounded-xl mt-16 md:sticky md:top-8">
                <div class="text-center px-6 py-2 pt-6">
                    <h3 class="font-semibold text-base">
                        Add an idea
                    </h3>
                    <p class="text-xs mt-4">
                        @auth
                            Let us know what you would like and we'll take a look over!
                        @else
                            Please log in to create an idea.
                        @endauth
                    </p>
                </div>
                @auth
                    <livewire:make-idea />
                @else
                    <div class="my-6 text-center">
                        <a href="{{ route('login') }}"
                            class="inline-block justify-center w-1/2 h-11 text-xs bg-blue text-white font-semibold rounded-xl border border-blue hover:bg-blue-hover transition duration-150 ease-in px-6 py-3">
                            Login
                        </a>

                        <a href="{{ route('register') }}"
                            class="inline-block justify-center w-1/2 h-11 text-xs bg-gray-200 font-semibold rounded-xl border border-gray-200 hover:border-gray-400 transition duration-150 ease-in px-6 py-3 mt-4">
                            Sign up
                        </a>
                    </div>
                @endauth
            </div>
        </div>
        <div class="w-full px-2 md:px-0 md:w-175">
            <livewire:status-filters />
            <div class="mt-8">
                {{ $slot }}
            </div>
        </div>
    </main>
    @livewireScripts
</body>

</html>
