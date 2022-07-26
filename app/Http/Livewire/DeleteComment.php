<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use Livewire\Component;

class DeleteComment extends Component
{
    public Comment $comment;
    protected $listeners = ['setDeleteComment'];

    public function setDeleteComment($id)
    {
        $this->comment = Comment::findOrFail($id);
        
        $this->emit('deleteCommentWasSet');
    }

    public function deleteComment()
    {
        if(auth()->guest() || auth()->user()->cannot('delete', $this->comment))
        {
            abort(403);
        }

        Comment::destroy($this->comment->id);
        $this->emit('commentWasDeleted', 'Comment Was Deleted');
    }

    public function render()
    {
        return view('livewire.delete-comment');
    }
}
