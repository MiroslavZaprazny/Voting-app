<?php

namespace App\Http\Livewire;

use App\Models\Idea;
use Livewire\Component;

class IdeaCardIndex extends Component
{
    public $idea;
    public $votesCount;
    public $hasVoted;

    public function mount(Idea $idea)
    {
        $this->hasVoted = $idea->voted_by_user;
    }

    public function vote()
    {
        if(auth()->guest()) {
            return $this->redirectToLogin();
        }

        if($this->hasVoted)
        {
            $this->idea->removeVote(auth()->user());
            $this->votesCount--;
            $this->hasVoted = false;
        } 
        else {
            $this->idea->vote(auth()->user());
            $this->votesCount++;
            $this->hasVoted = true;
        }
    }
    
    public function render()
    {
        return view('livewire.idea-card-index');
    }
}
