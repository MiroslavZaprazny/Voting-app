<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Idea;
use App\Models\Status;
use App\Models\Vote;
use Livewire\Component;
use Livewire\WithPagination;
use App\Http\Livewire\Traits\WithAuthRedirects;

class IdeaIndex extends Component
{ 
    use WithPagination, WithAuthRedirects;

    public $status;
    public $category;
    public $filter;
    public $search;

    protected $queryString = [
        'status',
        'category',
        'filter',
        'search'
    ];

    protected $listeners = ['queryStringUpdatedStatus', 'ideaWasCreated'];

    public function mount()
    {
        $this->category = request()->category ?? 'All Categories';
    }

    public function updatingCategory()
    {
        $this->resetPage();
    }

    public function upadtingFilter()
    {
        $this->resetPage();
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatedFilter()
    {
        if($this->filter === 'My Ideas'){
            if(auth()->guest()){
                return $this->redirectToLogin();
            }
        }
    }

    public function queryStringUpdatedStatus($status)
    {
        $this->status = $status;
        $this->resetPage();
    }

    public function ideaWasCreated() {
        $this->resetPage();
    }
       
    public function render()
    {
        $statuses = Status::all()->pluck('id', 'name');
        $categories = Category::all();

        return view('livewire.idea-index', [
            'ideas' => Idea::with('user', 'category', 'status')
                ->when($this->status && $this->status != 'All', function ($query) use($statuses){
                    return $query->where('status_id', $statuses->get($this->status));
                })
                ->when($this->category && $this->category != 'All Categories', function ($query) use($categories){
                    return $query->where('category_id', $categories->pluck('id', 'name')
                    ->get($this->category));
                })
                ->when($this->filter && $this->filter === 'Top Voted', function ($query){
                    return $query->orderByDesc('votes_count');
                })
                ->when($this->filter && $this->filter === 'My Ideas', function ($query){
                    return $query->where('user_id', auth()->id());
                })
                ->when($this->filter && $this->filter === 'Spam Ideas', function ($query){
                    return $query->where('spam_reports', '>', 0)->orderByDesc('spam_reports');
                })
                ->when(strlen($this->search) > 2, function ($query){
                    return $query->where('title', 'like',  '%'. $this->search .'%');
                })
                ->addSelect(['voted_by_user' => Vote::select('id')
                    ->where('user_id', auth()->id())
                    ->whereColumn('idea_id', 'ideas.id')
                ])
            ->withCount('votes')
            ->withCount('comments')
            ->latest('id')
            ->paginate(10),

            'categories' => $categories
        ]);
    }
}
