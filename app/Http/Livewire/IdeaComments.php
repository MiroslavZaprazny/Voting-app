<?php

namespace App\Http\Livewire;

use Livewire\Component;

class IdeaComments extends Component
{
    public $idea;

    public function render()
    {
        return view('livewire.idea-comments',[
            'comments' => $this->idea->comments
        ]);
    }
}
