<?php

namespace App\Http\Livewire;

use Livewire\Component;

class IdeaComment extends Component
{
    public $comment;
    public $ideaUserId;

    public $listeners = ['commentWasUpdated'];

    public function commentWasUpdated()
    {
        $this->comment->refresh();
    }

    public function render()
    {
        return view('livewire.idea-comment');
    }
}
