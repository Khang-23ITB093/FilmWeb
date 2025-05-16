<?php

namespace App\Livewire;

use App\Models\Film;
use Livewire\Component;

class Search extends Component
{
    public $search = '';
    public $searchInput = '';
    public $page = 10;
    public $suggestions = [];

    public function mount($search = null)
    {
        $this->search = $search;
        $this->searchInput = $search;
    }
    public function render()
    {
        $films = Film::query()
            ->where('title', 'like', "%{$this->search}%")
            ->orWhere('description', 'like', "%{$this->search}%")
            ->paginate($this->page);

        return view('livewire.search', ['films' => $films]);
    }

    public function updatedSearchInput()
    {
        $this->fetchSuggestions();
    }

    public function fetchSuggestions()
    {
        if (strlen($this->searchInput)) {
            $this->suggestions = Film::query()
                ->where('title', 'like', "%{$this->searchInput}%")
                ->limit(5)
                ->pluck('title')
                ->toArray();
        } else {
            $this->suggestions = [];
        }
    }
    public function searchFilm()
    {
        return redirect()->to('/search/' . ($this->searchInput));
    }

    public function selectSuggestion($title)
    {
        $this->searchInput = $title;
        return redirect()->to('/search/' . ($title));
    }

    public function clearInput()
    {
        $this->searchInput = '';
        $this->suggestions = [];
    }

    public function loadMore()
    {
        $this->page += 10;
    }
}
