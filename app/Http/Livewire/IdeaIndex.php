<?php

namespace App\Http\Livewire;

use App\Models\Idea;
use App\Models\Vote;
use Livewire\Component;
use Livewire\WithPagination;

class IdeaIndex extends Component
{ 
    use WithPagination;
       
    public function render()
    {
        return view('livewire.idea-index', [
            'ideas' => Idea::with('user', 'category', 'status')
                ->addSelect(['voted_by_user' => Vote::select('id')
                    ->where('user_id', auth()->id())
                    ->whereColumn('idea_id', 'ideas.id')
                ])
            ->withCount('votes')
            ->latest('id')
            ->paginate(10)
        ]);
    }
}
