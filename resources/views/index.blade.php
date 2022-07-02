<x-app-layout>
    <div class="filters flex space-x-6">
        <div class="w-1/3">
            <select name="category" id="category" class="w-full border-none rounded-xl px-4 py-2">
                    <option value="Category One">Category One</option>
            </select>
        </div>
        <div class="w-1/3">
            <select name="Filter" id="Filter" class="w-full border-none rounded-xl px-4 py-2">
                    <option value="Filter One">Filter One</option>
            </select>
        </div>
        <div class="w-2/3 relative">
            <svg class="w-4 text-gray-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
            </svg>
            <input type="search" placeholder="Find an idea" class="w-full border-none rounded-xl bg-white px-4 py-2">
        </div>
    </div>
</x-app-layout>