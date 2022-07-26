<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;

class IdeaComments extends Component
{
    use WithPagination;
    
    public $idea;

    protected $listeners = ['commentWasAdded', 'commentWasDeleted', 'statusWasUpdated'];

    public function commentWasAdded()
    {
        $this->idea->refresh();
    }

    public function commentWasDeleted()
    {
        $this->idea->refresh();
    }

    public function statusWasUpdated()
    {
        $this->idea->refresh();
    }
    
    public function render()
    {
        return view('livewire.idea-comments',[
            'comments' => $this->idea->comments()->with(['user', 'status'])->paginate(8)
        ]);
    }
}
