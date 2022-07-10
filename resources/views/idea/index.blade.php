<x-app-layout>
    <div class="filters flex flex-col md:flex-row md:space-x-6 space-y-3 md:space-y-0">
        <div class="w-full md:w-1/3">
            <select name="category" id="category" class="w-full border-none rounded-xl px-4 py-2">
                <option value="Category One">Category One</option>
            </select>
        </div>
        <div class="w-full md:w-1/3">
            <select name="Filter" id="Filter" class="w-full border-none rounded-xl px-4 py-2">
                <option value="Filter One">Filter One</option>
            </select>
        </div>
        <div class="w-full md:w-2/3 relative">
            <input type="search" placeholder="Find an idea"
                class="w-full placeholder-gray-900 border-none rounded-xl bg-white pl-8 py-2">
            <div class="absolute top-0 flex items-center h-full mx-2">
                <svg class="w-4 text-gray-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
            </div>
        </div>
    </div>

    <div class="ideas-container mt-8 space-y-6">
        @foreach ($ideas as $idea)
        <div class="idea-container bg-white rounded-xl flex transition ease-in duration-150 hover:shadow-md">
            <div class="hidden md:block border-r border-gray-100 px-5 py-8">
                <div class="text-center">
                    <div class="font-semibold text-2xl">
                        12
                    </div>
                    <div class="text-gray-500">
                        Votes
                    </div>
                </div>
                <div class="mt-8">
                    <button
                        class="w-20 bg-gray-200 border border-gray-200 hover:border-gray-400
                    transition ease-in duration-150 
                    font-semibold text-xs uppercase rounded-xl px-4 py-3">
                        Vote
                    </button>
                </div>
            </div>
            <div class="flex flex-col md:flex-row flex-1 px-2 py-4">
                <div class="flex-none mx-4 md:mx-0">
                    <a href="#">
                        <img src="{{$idea->user->getAvatar()}}" alt="avatar"
                            class="w-14 h-14 rounded-xl" alt="Profile picture" class="w-14 h-14 rounded-xl">
                    </a>
                </div>
                <div class="w-full flex flex-col justify-between mx-4 mt-2 md:mt-0">
                    <h4 class="text-xl font-semibold">
                        <a href="{{route('idea.show', $idea)}}" class="hover:underline">
                            {{$idea->title}}
                        </a>
                    </h4>
                    <div class="text-gray-600 mt-3 line-clamp-3">
                        {{$idea->description}}
                    </div>
                    <div class="flex flex-col lg:flex-row lg:items-center justify-between mt-6 -ml-8">
                        <div class="flex text-gray-400 tems-center text-xs font-semibold space-x-2 ">
                            <div>
                                {{$idea->created_at->diffForHumans()}}
                            </div>
                            <div>
                                &bull;
                            </div>
                            <div>
                               {{$idea->category->name}}
                            </div>
                            <div>
                                &bull;
                            </div>
                            <div class="text-gray-900">
                                4 Comments
                            </div>
                        </div>
                        <div class="flex justify-between mr-12 lg:mr-0 mt-6 lg:mt-0 -ml-2">
                            <div x-data="{ isOpen: false }" class="flex-items-center space-x-2 mt-4 md:mt-0">
                                <button
                                    class="{{ Str::kebab($idea->status->name) }} text-xxs font-bold uppercase leading-none rounded-full text-center w-28 h-7 py-2 px-4">
                                    {{$idea->status->name}}
                                </button>
                                <button @click="isOpen = !isOpen"
                                    class="relative bg-gray-100 border transition ease-in duration-150 hover:bg-gray-200 rounded-full h-7 py-2 px-3">
                                    <svg fill="currentColor" width="24" height="6">
                                        <path
                                            d="M2.97.061A2.969 2.969 0 000 3.031 2.968 2.968 0 002.97 6a2.97 2.97 0 100-5.94zm9.184 0a2.97 2.97 0 100 5.939 2.97 2.97 0 100-5.939zm8.877 0a2.97 2.97 0 10-.003 5.94A2.97 2.97 0 0021.03.06z"
                                            style="color: rgba(163, 163, 163, .5)">
                                    </svg>
                                    <ul x-cloak x-show="isOpen" x-transition.origin.top.left.duration.200ms
                                        @click.away="isOpen = false"
                                        class="absolute ml-8 first-letter:text-left font-semibold bg-white w-44 shadow-lg rounded-xl py-3">
                                        <li>
                                            <a href="#"
                                                class="hover:bg-gray-100 block px-5 py-3 transition ease-in duration-150">
                                                Mark as spam
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#"
                                                class="hover:bg-gray-100 block px-5 py-3 transition ease-in duration-150">
                                                Delete post
                                            </a>
                                        </li>
                                    </ul>
                                </button>
                            </div>
                            <div class="flex items-center md:hidden mt-4 md:mt-0 space-x-4 md:space-x-0">
                                <div class="bg-gray-100 text-center rounded-xl h-10 px-4 py-2">
                                    <div class="text sm font-bold leading-none">
                                        12
                                    </div>
                                    <div class="text-xxs font-semibold leading-none text-gray-4oo">
                                        Votes
                                    </div>
                                </div>
                                <button
                                    class="w-20 bg-gray-200 border border-gray-200 
                            font-bold text-xxs uppercase rounded-xl hover:border-gray-400 transition 
                            duration-150 ease-in px-4 py-2">
                                    Vote
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="my-5">
        {{$ideas->links()}}
    </div>
</x-app-layout>
