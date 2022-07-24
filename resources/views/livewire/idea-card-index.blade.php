<div class="idea-container bg-white rounded-xl flex transition ease-in duration-150 hover:shadow-md">
    <div class="hidden md:block border-r border-gray-100 px-5 py-8">
        <div class="text-center">
            <div class="font-semibold text-2xl @if ($hasVoted) text-blue @endif">
                {{ $votesCount }}
            </div>
            <div class="text-gray-500">
                Votes
            </div>
        </div>
        <div class="mt-8">
            @if ($hasVoted)
                <button wire:click.prevent="vote"
                    class="w-20 bg-blue text-white border border-gray-200 hover:border-gray-400
                    transition ease-in duration-150 
                    font-semibold text-xs uppercase rounded-xl px-4 py-3">
                    Voted
                @else
                    <button wire:click.prevent="vote"
                        class="w-20 bg-gray-200 border border-gray-200 hover:border-gray-400
                        transition ease-in duration-150 
                        font-semibold text-xs uppercase rounded-xl px-4 py-3">
                        Vote
                    </button>
            @endif
        </div>
    </div>
    <div class="flex flex-col md:flex-row flex-1 px-2 py-4">
        <div class="flex-none mx-4 md:mx-0">
            <a href="#">
                <img src="{{ $idea->user->getAvatar() }}" alt="avatar" class="w-14 h-14 rounded-xl"
                    alt="Profile picture" class="w-14 h-14 rounded-xl">
            </a>
        </div>
        <div class="w-full flex flex-col justify-between mx-4 mt-2 md:mt-0">
            <h4 class="text-xl font-semibold">
                <a href="{{ route('idea.show', $idea) }}" class="hover:underline">
                    {{ $idea->title }}
                </a>
            </h4>
            <div class="text-gray-600 mt-3 line-clamp-3">
                @admin()
                    @if ($idea->spam_reports > 0)
                        <div class="text-red mb-2">
                            Spam reports: {{$idea->spam_reports}}
                        </div>
                    @endif
                @endadmin
                {{ $idea->description }}
            </div>
            <div class="flex flex-col lg:flex-row lg:items-center justify-between mt-6 ml-0 md:-ml-8">
                <div class="flex text-gray-400 tems-center text-xs font-semibold space-x-2 ">
                    <div>
                        {{ $idea->created_at->diffForHumans() }}
                    </div>
                    <div>
                        &bull;
                    </div>
                    <div>
                        {{ $idea->category->name }}
                    </div>
                    <div>
                        &bull;
                    </div>
                    <div class="text-gray-900">
                        @if (!$idea->comments_count == 0)
                            {{ $idea->comments_count }} Comments
                        @else
                            No Comments
                        @endif
                    </div>
                </div>
                <div class="flex justify-between mr-12 lg:mr-0 mt-6 lg:mt-0 -ml-2">
                    <div x-data="{ isOpen: false }" class="flex-items-center space-x-2 mt-4 md:mt-0">
                        <button
                            class="{{ Str::kebab($idea->status->name) }} text-xxs font-bold uppercase leading-none rounded-full text-center w-28 h-7 py-2 px-4">
                            {{ $idea->status->name }}
                        </button>
                    </div>
                    <div class="flex items-center md:hidden mt-4 md:mt-0 space-x-4 md:space-x-0">
                        <div class="bg-gray-100 text-center rounded-xl h-10 px-4 py-2">
                            <div class="text sm font-bold leading-none">
                                {{ $votesCount }}
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
