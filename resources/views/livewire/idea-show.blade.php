<div class="idea-and-button-container">
    <div class="idea-container bg-white rounded-xl flex mt-4">
        <div class="flex flex-col md:flex-row flex-1 px-4 py-6">
            <div class="flex-none mx-4 md:mx-0">
                <a href="#">
                    <img src="{{ $idea->user->getAvatar() }}" alt="avatar" class="w-14 h-14 rounded-xl">
                </a>
            </div>
            <div class="w-full mx-4 mt-2 md:mt-0">
                <h4 class="text-xl font-semibold">
                    {{ $idea->title }}
                </h4>
                <div class="text-gray-600 mt-3">
                    {{ $idea->description }}
                </div>

                <div class="flex flex-col md:flex-row md:items-center justify-between mt-6 space-y-2 md:space-y-0">
                    <div class="flex items-center ml-0 md:-ml-8 text-xs text-gray-400 font-semibold space-x-2">
                        <div class="hidden md:block font-bold text-gray-900">{{ $idea->user->name }}</div>
                        <div class="hidden md:block">&bull;</div>
                        <div>{{ $idea->created_at->diffForHumans() }}</div>
                        <div>&bull;</div>
                        <div>{{ $idea->category->name }}</div>
                        <div>&bull;</div>
                        <div class="text-gray-900">3 Comments</div>
                    </div>
                    <div x-data="{ isOpen: false }" class="flex items-center space-x-2">
                        <div
                            class="{{ Str::kebab($idea->status->name) }} text-xxs font-bold uppercase leading-none rounded-full text-center w-28 h-7 py-2 px-4">
                            {{ $idea->status->name }}</div>
                        <div class="relative">
                            <button @click="isOpen = !isOpen"
                                class="relative bg-gray-100 hover:bg-gray-200 border rounded-full h-7 transition duration-150 ease-in py-2 px-3">
                                <svg fill="currentColor" width="24" height="6">
                                    <path
                                        d="M2.97.061A2.969 2.969 0 000 3.031 2.968 2.968 0 002.97 6a2.97 2.97 0 100-5.94zm9.184 0a2.97 2.97 0 100 5.939 2.97 2.97 0 100-5.939zm8.877 0a2.97 2.97 0 10-.003 5.94A2.97 2.97 0 0021.03.06z"
                                        style="color: rgba(163, 163, 163, .5)">
                                </svg>
                            </button>
                            <ul x-cloak x-show="isOpen" x-transition.origin.top.left.duration.200ms
                                @click.away="isOpen = false"
                                class="absolute w-44 text-left font-semibold bg-white shadow-dialog rounded-xl
                            py-3 z-10 md:ml-8 top-8 xl:top-6     right-0 xl:left-0">
                                <li>
                                    <a @click="
                                        isOpen=false
                                        $dispatch('custom-show-edit-modal')
                                    "
                                    href="#"
                                        class="hover:bg-gray-100 block transition duration-150 ease-in px-5 py-3">Edit
                                        Idea</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="hover:bg-gray-100 block transition duration-150 ease-in px-5 py-3">Mark
                                        as Spam</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="hover:bg-gray-100 block transition duration-150 ease-in px-5 py-3">Delete
                                        Idea</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- end idea-container -->

    <div class="buttons-container flex items-center justify-between mt-6 ml-12 md:ml-0 space-y-3 md:space-y-0">
        <div class="flex flex-col md:flex-row md:items-center space-y-4 md:space-y-0 md:space-x-4 md:ml-6">
            <div x-data="{ isOpen: false }" class="relative">
                <button @click="isOpen = !isOpen" type="button"
                    class="flex items-center justify-center h-10 w-36 text-xs bg-blue text-white font-semibold rounded-xl border border-blue hover:bg-blue-hover transition duration-150 ease-in px-6 py-3">
                    Reply
                </button>
                <div x-cloak x-show="isOpen" x-transition.origin.top.left.duration.200ms @click.away="isOpen = false"
                    class="absolute z-10 w-64 md:w-104 text-left font-semibold text-sm bg-white shadow-dialog rounded-xl mt-2">
                    <form action="#" method="POST" class="space-y-4 px-4 py-6">
                        <div>
                            <textarea name="post_comment" id="post_comment" cols="30" rows="4"
                                class="w-full text-sm bg-gray-100 rounded-xl placeholder-gray-900 border-none resize-none px-4 py-2"
                                placeholder="Go ahead, dont be shy. Share your thoughts ..."></textarea>
                        </div>

                        <div class="flex items-center space-x-3">
                            <button type="button"
                                class="flex items-center justify-center h-10 w-1/2 text-xs bg-blue text-white font-semibold rounded-xl border border-blue hover:bg-blue-hover transition duration-150 ease-in px-6 py-3">
                                Post Comment
                            </button>
                            <button type="button"
                                class="flex items-center justify-center w-32 h-11 bg-gray-200 font-semibold rounded-xl border border-gray-200 hover:border-gray-400 transition ease-in duration-150">
                                <svg class="text-gray-600 w-4 transform -rotate-45" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13" />
                                </svg>
                                <span class="ml-1 text-xs">Attach</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            @auth
                @if (auth()->user()->isAdmin())
                    <livewire:set-status :idea="$idea" />
                @endif
            @endauth
        </div>
        <div class="flex items-center space-x-3 ml-4">
            <div class="bg-white font-semibold text-center rounded-xl px-3 py-2">
                <div class="text-xl leading-snug @if ($hasVoted) text-blue @endif">{{ $votesCount }}
                </div>
                <div class="text-gray-400 text-xs leading-none">Votes</div>
            </div>
            @if ($hasVoted)
                <button wire:click.prevent="vote" type="button"
                    class="w-32 h-10 text-xs bg-blue font-semibold uppercase rounded-xl border border-gray-200 hover:border-gray-400 transition duration-150 ease-in px-6 py-3">
                    <span class="text-white">Voted</span>
                </button>
            @else
                <button wire:click.prevent="vote" type="button"
                    class="w-32 h-10 text-xs bg-gray-200 font-semibold uppercase rounded-xl border border-gray-200 hover:border-gray-400 transition duration-150 ease-in px-6 py-3">
                    <span>Vote</span>
                </button>
            @endif
        </div>
    </div> <!-- end buttons-container -->
</div>
