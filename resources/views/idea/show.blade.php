<x-app-layout>
    <div>
        <a href="{{ $backUrl }}" class="flex items-center font-semibold hover:underline">
            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
            <span class="ml-2">All ideas (or back to chosen category with filters)</span>
        </a>
    </div>

    <livewire:idea-show :idea="$idea" :votesCount="$votesCount" />

    <x-notification-success/>

    <livewire:edit-idea :idea="$idea" />

    <livewire:delete-idea :idea="$idea" />

    <livewire:mark-idea-as-spam :idea="$idea" />

    <livewire:mark-idea-as-not-spam :idea="$idea" />

    <livewire:idea-comments :idea="$idea" />

    <livewire:edit-comment />

    <livewire:delete-comment />

    <livewire:mark-comment-as-spam />

    <livewire:mark-comment-as-not-spam />
</x-app-layout>
