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
    <header class="flex flex-col md:flex-row items-center justify-between px-8 py-4">
        <a href="#"><img src="{{ asset('img/logo.svg') }}" alt="Logo"></a>
        <div class="flex items-center mt-2 md:mt-0">
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
                            Let us know what you would like and we'll take a look over!
                        </p>
                    </div>
                    <form action="#" method="POST" class="space-y-4 px-4 py-6">
                        <div>
                            <input type="text" class="w-full
                             bg-gray-100 border-none text-sm rounded-xl placeholder-gray-900 px-4 py-2"
                             placeholder="Your Idea"
                             >
                        </div>
                        <div>
                            <select name="category_add" id="category_add" class="w-full text-sm bg-gray-100 border-none rounded-xl px-4 py-2">
                                <option value="Category One">Category One</option>
                            </select>
                        </div>
                        <div>
                            <textarea name="idea" id="idea" cols="30" rows="4" class="w-full bg-gray-100 rounded-xl placeholder-gray-900 border-none px-4 py-2 resize-none text-sm" placeholder="Describe your idea"></textarea>
                        </div>
                        <div class="flex items-center justify-between space-x-3">
                            <button type="button" 
                            class="flex items-center justify-center w-1/2 h-11 bg-gray-200 font-semibold rounded-xl border border-gray-200 hover:border-gray-400 transition ease-in duration-150">
                                <svg class="text-gray-600 w-4 transform -rotate-45" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13" />
                                </svg>
                                <span class="ml-1 text-xs">Attach</span>
                            </button>
                            <button type="submit" 
                            class="flex items-center justify-center w-1/2 h-11 text-white bg-blue font-semibold rounded-xl border border-blue hover:bg-blue-hover transition ease-in duration-150">
                                Submit
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="w-full px-2 md:px-0 md:w-175">
               <nav class="hidden md:flex item-center justify-between text-xs">
                    <ul class="flex uppercase font-semibold border-gray-300 border-b-4 pb-3 rounded">
                        <li>
                            <a class="border-b-4 pb-3 border-blue" href="#">
                             All ideas
                            </a>
                            <a class="ml-5 text-gray-400 hover:border-blue border-gray-300 border-b-4 pb-3 transition ease-in duration-150" href="#">
                                Considering
                            </a>
                            <a class="ml-5 text-gray-400 hover:border-blue border-gray-300 border-b-4 pb-3 transition ease-in duration-150" href="#">
                                In progress
                            </a>
                        </li>
                    </ul>

                    <ul class="flex uppercase font-semibold border-gray-300 border-b-4 pb-3 rounded">
                        <li>
                            <a class="text-gray-400 hover:border-blue border-gray-300 border-b-4 pb-3 transition ease-in duration-150" href="#">
                                Implemented
                            </a>
                            <a class="ml-5 text-gray-400 hover:border-blue border-gray-300 border-b-4 pb-3 transition ease-in duration-150" href="#">
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
