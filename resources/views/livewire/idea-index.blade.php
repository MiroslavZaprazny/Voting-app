<div>
    <div class="filters flex flex-col md:flex-row md:space-x-6 space-y-3 md:space-y-0">
        <div class="w-full md:w-1/3">
            <select wire:model="category" name="category" id="category" class="w-full border-none rounded-xl px-4 py-2">
                <option value="All Categories">All Categories</option>
                @foreach ($categories as $category )
                    <option value="{{$category->name}}">{{$category->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="w-full md:w-1/3">
            <select wire:model="filter" name="Filter" id="Filter" class="w-full border-none rounded-xl px-4 py-2">
                <option value="No Filter">No Filter</option>
                <option value="Top Voted">Top Voted</option>
                <option value="My Ideas">My Ideas</option>
                @admin
                    <option value="Spam Ideas">Spam Ideas</option>
                @endadmin
            </select>
        </div>
        <div class="w-full md:w-2/3 relative">
            <input wire:model="search"
             type="search" placeholder="Find an idea"
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
        @forelse ($ideas as $idea)
            <livewire:idea-card-index
            :key="$idea->id"
            :idea="$idea" 
            :votesCount="$idea->votes_count"
             />
        @empty
            <div class="text-center font-bold mt-12">
                No ideas were found
            </div>
        @endforelse
    </div>
    <div class="my-10">
        {{-- {{ $ideas->links() }} --}}
        {{ $ideas->appends(request()->query())->links() }}
    </div>
</div>
