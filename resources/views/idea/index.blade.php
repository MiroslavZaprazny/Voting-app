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
            <livewire:idea-index :idea="$idea" :votesCount="$idea->votes_count" />
        @endforeach
    </div>
    <div class="my-5">
        {{ $ideas->links() }}
    </div>
</x-app-layout>
