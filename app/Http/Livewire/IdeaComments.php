<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;

class IdeaComments extends Component
{
    use WithPagination;
    
    public $idea;

    protected $listeners = ['commentWasAdded'];

    public function commentWasAdded()
    {
        $this->idea->refresh();
    }
    
    public function render()
    {
        return view('livewire.idea-comments',[
            'comments' => $this->idea->comments()->with(['user'])->paginate(8)
        ]);
    }
}
