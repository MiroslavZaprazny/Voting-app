<div
    x-cloak
    x-data ="{ isOpen:false }"
    x-show="isOpen"
    @keydown.escape.window="isOpen = false"
    @custom-show-edit-modal.window="isOpen = true"
    x-init="
    window.livewire.on('ideaWasUpdated', () => {
        isOpen = false
    })"
     class="relative z-10" aria-labelledby="modal-title" role="dialog" aria-modal="true">

    <div 
        x-show="isOpen"
        x-transition.opacity
        class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
    <div class="fixed z-10 inset-0 overflow-y-auto">
        <div 
            x-show="isOpen"
            class="flex items-end sm:items-center justify-center min-h-full">
            <div 
                x-show="isOpen"
                x-transition.origin.bottom.duration.300ms
                class="relative bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:max-w-lg sm:w-full">
                <div class="absolute top-0 right-0 pt-4 pr-4">
                    <button @click="isOpen = false"
                    class="text-gray-400 hover:text-gray-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <h3 class="text-center text-lg font-medium text-gray-900">Edit Idea</h3>
                    <p class="text-xs text-center text-gray-500 mt-4">
                        You have one hour to edit your idea from the time you created it.
                    </p>
                    <form wire:submit.prevent="updateIdea" action="#" method="POST" class="space-y-4 px-4 py-6">
                        <div>
                            <input wire:model="title" type="text"
                                class="w-full bg-gray-100 border-none text-sm rounded-xl placeholder-gray-900 px-4 py-2"
                                placeholder="Your Idea">
                            @error('title')
                                <p class="text-red text-xs mt-1 ml-2">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                        <div>
                            <select wire:model="category" name="category_add" id="category_add"
                                class="w-full text-sm bg-gray-100 border-none rounded-xl px-4 py-2">
                                @foreach ($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                            @error('category')
                                <p class="text-red text-xs mt-1 ml-2">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                        <div>
                            <textarea wire:model="description" name="idea" id="idea" cols="30" rows="7"
                                class="w-full bg-gray-100 rounded-xl placeholder-gray-900 border-none px-4 py-2 resize-none text-sm"
                                placeholder="Describe your idea"></textarea>
                            @error('description')
                                <p class="text-red text-xs mt-1 ml-2">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
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
                                class="flex items-center justify-center w-1/2 h-11 text-white bg-blue font-semibold rounded-xl border border-blue hover:bg-blue-hover transition ease-in duration-150">
                                Update
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
