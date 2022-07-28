<div x-data="{ isOpen: false }" class="relative">
    <button @click="
        isOpen = !isOpen
        if(isOpen)
        {
            Livewire.emit('getNotifications')
        }
    ">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-700" fill="none" viewBox="0 0 24 24"
            stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
        </svg>
    </button>
    <div class="absolute flex justify-center items-center w-4 h-4 rounded-full bg-red text-white text-xxs"
        style="top: -4px; right: -4px;">
        8
    </div>
    <ul x-cloak x-show="isOpen" x-transition.origin.top.duration.200ms @click.away="isOpen = false"
        class="absolute w-70 md:w-96 max-h-128 overflow-y-auto text-left bg-white shadow-dialog rounded-xl
            z-10 md:ml-8 top-10 md:top-8 -right-20 md:right-2">
        @foreach ($notifications as $notification)
            <li>
                <a @click="
            isOpen=false
        " href="{{route('idea.show', $notification->data['idea_slug'])}}"
                    class="flex hover:bg-gray-100 transition duration-150 ease-in px-5 py-3">
                    <img src="{{ $notification->data['user_avatar'] }}" alt="avatar"
                        class="rounded-full w-10 h-10">
                    <div class="ml-4">
                        <div>
                            <span class="font-semibold">
                                {{ $notification->data['user_name'] }}
                            </span>
                            <span>
                                commented on
                            </span>
                            <span class="font-semibold">
                                {{ $notification->data['idea_title'] }}
                            </span>

                            <span class="line-clamp-3">
                                "{{ $notification->data['comment_body'] }}"
                            </span>

                        </div>
                        <div class="text-xs text-gray-500 mt-1">
                            {{ $notification->created_at->diffForHumans()}}
                        </div>
                    </div>
                </a>
            </li>
        @endforeach
        <li class="border-t border-gray-300 text-center">
            <button class="w-full block font-semibold hover:bg-gray-100 transition ease-in duration-150 py-4">
                Mark all as read
            </button>
        </li>
    </ul>
</div>
