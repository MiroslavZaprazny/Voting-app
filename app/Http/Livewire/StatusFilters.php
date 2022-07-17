<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Route;

class StatusFilters extends Component
{
    public $status = 'All';

    protected $queryString = [
        'status',
    ];

    public function mount()
    {
        if (Route::currentRouteName() === 'idea.show') {
            $this->status = null;
            $this->queryString = [];
        }
    }

    public function setStatus($status)
    {
        $this->status = $status;

        // if ($this->getPreviousRouteName()) {
            return redirect()->route('idea.index', [
                'status' => $this->status
            ]);
        // }
    }

    private function getPreviousRouteName()
    {
        return app('router')->getRoutes()->match(app('request')->create(url()->previous()))
                ->getName() === 'idea.show' ;
    }

    public function render()
    {
        return view('livewire.status-filters');
    }
}
