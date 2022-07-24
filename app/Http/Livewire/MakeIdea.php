<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Idea;
use Livewire\Component;

class MakeIdea extends Component
{
    public $title = '';
    public $category = 1;
    public $description = '';

    protected $rules = [
        'title' => 'required|min:4',
        'category' => 'required|exists:App\Models\Category,id',
        'description' => 'required|min:4'
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function createIdea()
    {
        $this->validate();
        Idea::create([
            'user_id' => auth()->id(),
            'category_id' => $this->category,
            'status_id' => 1,
            'title' => $this->title,
            'description' => $this->description
        ]);

        session()->flash('success_message', 'Idea was added successfully');

        $this->reset();

        $this->emit('ideaWasCreated');
        
        return redirect()->back();
    }

    public function render()
    {
        return view('livewire.make-idea', [
            'categories' => Category::all()
        ]);
    }
}
