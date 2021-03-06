<?php

namespace App\Http\Livewire;

use Livewire\Component;

class MarkIdeaAsNotSpam extends Component
{
    public $idea;

    public function markAsNotSpam()
    {
        if(auth()->guest() || ! auth()->user()->isAdmin())
        {
            abort(403);
        }

        $this->idea->spam_reports = 0;
        $this->idea->save();

        $this->emit('ideaWasMarkedAsNotSpam', 'This idea was marked not spam');
    }

    public function render()
    {
        return view('livewire.mark-idea-as-not-spam');
    }
}
