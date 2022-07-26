<div 
    x-data="{ isOpen: false }" 
    class="relative"
    x-init="
        window.livewire.on('statusWasUpdated', () => {
            isOpen = false
        })"
    >
    <button @click="isOpen = !isOpen" type="button"
        class="flex items-center justify-center w-36 h-10 text-xs bg-gray-200 font-semibold rounded-xl border border-gray-200 hover:border-gray-400 transition duration-150 ease-in px-6 py-3">
        <span>Set Status</span>
        <svg class="w-4 h-4 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
        </svg>
    </button>
    <div x-cloak x-show="isOpen" x-transition.origin.top.left.duration.200ms @click.away="isOpen = false"
        class="absolute z-20 w-64 md:w-76 text-left font-semibold text-sm bg-white shadow-dialog rounded-xl mt-2">
        <form wire:submit.prevent="setStatus" action="#" method="POST" class="space-y-4 px-4 py-6">
            <div class="space-y-2">
                @foreach ($statuses as $status)
                    <div>
                        <label class="inline-flex items-center">
                            <input wire:model="status" type="radio"
                                class="bg-gray-200 {{ $status->text_color }} border-none" name="status"
                                value="{{ $status->id }}">
                            <span class="ml-2">{{ $status->name }}</span>
                        </label>
                    </div>
                @endforeach
            </div>
            <textarea wire:model="comment"
            name="update_comment" cols="30" rows="3"
                class="w-full text-sm bg-gray-100 rounded-xl placeholder-gray-900 border-none resize-none px-4 py-3"
                placeholder="Add an update comment (optional)"></textarea>

            <div class="flex items-center justify-between space-x-3">
                <button type="button"
                    class="flex items-center justify-center w-1/2 h-11 bg-gray-200 font-semibold rounded-xl border border-gray-200 hover:border-gray-400 transition ease-in duration-150">
                    <svg class="text-gray-600 w-4 transform -rotate-45" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13" />
                    </svg>
                    <span class="ml-1 text-xs">Attach</span>
                </button>
                <button type="submit"
                    class="flex items-center justify-center w-1/2 h-11 text-white 
                    bg-blue font-semibold rounded-xl border border-blue
                     hover:bg-blue-hover transition ease-in duration-150 disabled:opacity-50">
                    Update
                </button>
            </div>

            <div>
                <label class="font-normal inline-flex items-center">
                    <input wire:model="notifyAllVoters"
                    class="rounded bg-gray-200" type="checkbox" name="notify_voters">
                    <span class="ml-2">
                        Notify all voters
                    </span>
                </label>
            </div>
        </form>
    </div>
</div>
