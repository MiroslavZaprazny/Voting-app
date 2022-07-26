<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use Livewire\Component;

class MarkCommentAsNotSpam extends Component
{
    public Comment $comment;

    protected $listeners = ['setMarkAsNotSpamComment', 'markAsNotSpam'];

    public function setMarkAsNotSpamComment($id)
    {
        $this->comment = Comment::findOrFail($id);

        $this->emit('markAsNotSpamCommentWasSet');
    }

    public function markAsNotSpam()
    {
        $this->comment->spam_reports = 0;
        $this->comment->save();
        
        $this->emit('commentWasMarkedAsNotSpam', 'Comment was marked as NOT spam!');
    }

    public function render()
    {
        return view('livewire.mark-comment-as-not-spam');
    }
}
