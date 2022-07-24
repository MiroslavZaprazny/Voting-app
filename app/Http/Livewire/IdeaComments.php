<?php

namespace App\Http\Livewire;

use Livewire\Component;

class IdeaComments extends Component
{
    public $idea;

    protected $listeners = ['commentWasAdded'];

    public function commentWasAdded()
    {
        $this->idea->refresh();
    }
    
    public function render()
    {
        return view('livewire.idea-comments',[
            'comments' => $this->idea->comments
        ]);
    }
}
