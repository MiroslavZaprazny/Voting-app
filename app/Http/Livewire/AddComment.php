<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use App\Notifications\CommentAdded;
use Livewire\Component;

class AddComment extends Component
{
    public $idea;
    public $comment;
    protected $rules = [
        'comment' => 'required|min:4'
    ];

    public function addComment()
    {
        if(auth()->guest())
        {
            abort(403);
        }

        $this->validate();

       $newComment = Comment::create([
            'user_id' => auth()->id(),
            'idea_id' => $this->idea->id,
            'status_id' => 1,
            'body' => $this->comment
        ]);

        $this->idea->user->notify(new CommentAdded($newComment));

        $this->reset();

        $this->emit('commentWasAdded', 'Comment was posted!');
    }

    public function render()
    {
        return view('livewire.add-comment');
    }
}
