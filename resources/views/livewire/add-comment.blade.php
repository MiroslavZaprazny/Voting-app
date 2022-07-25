<div x-init="
window.livewire.on('commentWasAdded', () => {
    isOpen = false
})
    Livewire.hook('message.processed', (message, component) =>{
        if(message.updateQueue[0].payload.event == 'commentWasAdded' && message.component.fingerprint.name == 'idea-comments')
        {
            const lastComment = document.querySelector('.comment-container:first-child')
            lastComment.scrollIntoView({ behavior: 'smooth' })
            lastComment.classList.add('bg-gray-200')
            setTimeout(() => {
                lastComment.classList.remove('bg-gray-200')
            }, 2000)
        }
    })
"
x-data="{ isOpen: false }" class="relative">
    <button @click="
        isOpen = !isOpen
        if(isOpen){
            $nextTick(()=>$refs.comment.focus())}" 
        type="button"
        class="flex items-center justify-center h-10 w-36 text-xs bg-blue text-white font-semibold rounded-xl border border-blue hover:bg-blue-hover transition duration-150 ease-in px-6 py-3">
        Reply
    </button>
    <div x-cloak x-show="isOpen" x-transition.origin.top.left.duration.200ms @click.away="isOpen = false"
        class="absolute z-10 w-64 md:w-104 text-left font-semibold text-sm bg-white shadow-dialog rounded-xl mt-2">
        @auth
            <form wire:submit.prevent="addComment"
            action="#" method="POST" class="space-y-4 px-4 py-6">
                <div>
                    <textarea x-ref="comment"
                    wire:model="comment"
                    name="post_comment" id="post_comment" cols="30" rows="4"
                        class="w-full text-sm bg-gray-100 rounded-xl placeholder-gray-900 border-none resize-none px-4 py-2"
                        placeholder="Go ahead, dont be shy. Share your thoughts ..."></textarea>
                    @error('comment')
                        <p class="text-red text-xs mt-1">
                            {{$message}}
                        </p>
                    @enderror
                </div>

                <div class="flex items-center space-x-3">
                    <button type="submit"
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
        @else
            <div class="px-4 py-6">
                <p class="font-normal ml-1">
                    Please login or create an account to post a comment.
                </p>
                <div class="flex items-center space-x-3 mt-8">
                    <a 
                        href="{{ route('login') }}"\
                        class="flex items-center justify-center w-1/2 h-11 text-xs bg-blue text-white font-semibold rounded-xl border border-blue hover:bg-blue-hover transition duration-150 ease-in px-6 py-3"
                        >
                            Login
                    </a>
                    <a 
                        href="{{ route('register') }}"
                        class="flex items-center justify-center w-1/2 h-11 bg-gray-200 font-semibold text-xs rounded-xl border border-gray-200 hover:border-gray-400 transition ease-in duration-150"
                        >
                            Register
                    </a>
                </div>
            </div>
        @endauth
    </div>
</div>
