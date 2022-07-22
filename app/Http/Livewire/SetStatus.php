<?php

namespace App\Http\Livewire;

use App\Models\Status;
use Livewire\Component;

class SetStatus extends Component
{
    public $idea;
    public $status;

    public function mount()
    {
        $this->status = $this->idea->status_id;
    }

    public function setStatus()
    {
        if (!auth()->check() || ! auth()->user()->isAdmin()) {
            abort(403);
        }

        $this->idea->status_id = $this->status;
        $this->idea->save();
        
        $this->emit('statusWasUpdated');
    }

    public function render()
    {
        return view('livewire.set-status', [
            'statuses' => Status::all()
        ]);
    }
}
