<?php

namespace App\Http\Livewire;

use Livewire\Component;

class MarkIdeaAsSpam extends Component
{

    public $idea;

    public function markAsSpam()
    {
        if(auth()->guest())
        {
            abort(403);
        }

        $this->idea->spam_reports ++;
        $this->idea->save();

        $this->emit('ideaWasMarkedAsSpam', 'Idea was marked as spam');
    }
    
    public function render()
    {
        return view('livewire.mark-idea-as-spam');
    }
}
