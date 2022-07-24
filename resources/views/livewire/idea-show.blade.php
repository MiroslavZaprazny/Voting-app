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
                    @admin()
                        @if ($idea->spam_reports > 0)
                            <div class="text-red mb-2">
                                Spam reports: {{ $idea->spam_reports }}
                            </div>
                        @endif
                    @endadmin
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
                        <div class="text-gray-900">
                            @if (!$idea->comments->count() == 0)
                                {{ $idea->comments->count() }} Comments
                            @else
                                No Comments
                            @endif
                        </div>
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
                                @can('update', $idea)
                                    <li>
                                        <a @click="
                                        isOpen=false
                                        $dispatch('custom-show-edit-modal')
                                    "
                                            href="#"
                                            class="hover:bg-gray-100 block transition duration-150 ease-in px-5 py-3">Edit
                                            Idea</a>
                                    </li>
                                @endcan
                                <li>
                                    <a @click="
                                        isOpen=false
                                        $dispatch('custom-show-spam-modal')"
                                        href="#"
                                        class="hover:bg-gray-100 block transition duration-150 ease-in px-5 py-3">Mark
                                        as Spam</a>
                                </li>
                                @can('delete', $idea)
                                    <li>
                                        <a @click="
                                    isOpen=false
                                    $dispatch('custom-show-delete-modal')
                                "
                                            href="#"
                                            class="hover:bg-gray-100 block transition duration-150 ease-in px-5 py-3">Delete
                                            Idea</a>
                                    </li>
                                @endcan
                                @admin('delete', $idea)
                                    @if ($idea->spam_reports > 0)
                                        <li>
                                            <a @click="
                                isOpen=false
                                $dispatch('custom-show-spam-not-modal')
                            "
                                                href="#"
                                                class="hover:bg-gray-100 block transition duration-150 ease-in px-5 py-3">Not
                                                spam</a>
                                        </li>
                                    @endif
                                @endadmin
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- end idea-container -->

    <div class="buttons-container flex items-center justify-between mt-6 ml-12 md:ml-0 space-y-3 md:space-y-0">
        <div class="flex flex-col md:flex-row md:items-center space-y-4 md:space-y-0 md:space-x-4 md:ml-6">
            <livewire:add-comment :idea="$idea" />
            @auth
                @if (auth()->user()->isAdmin())
                    <livewire:set-status :idea="$idea" />
                @endif
            @endauth
        </div>
        <div class="flex items-center space-x-3 ml-4">
            <div class="bg-white font-semibold text-center rounded-xl px-3 py-2">
                <div class="text-xl leading-snug @if ($hasVoted) text-blue @endif">
                    {{ $votesCount }}
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
