<?php

namespace App\Livewire;

use App\Models\Film;
use Livewire\Component;
use Livewire\WithPagination;

class Explore extends Component
{
    use WithPagination;

    public $sortBy = 'rating';
    public $type;
    public $page = 10;
    public $genres = [];
    public function mount($type)
    {
        $this->type = $type;
    }

    public function updateSortBy($value)
    {
        $this->sortBy = $value;
        $this->resetPage(); // Reset pagination to the first page
    }

    public function updateGenres($values)
    {
        // Gán giá trị mới cho genres từ mảng `$values`
        $this->genres = is_array($values) ? $values : [];
        $this->resetPage(); // Reset pagination về trang đầu tiên
    }


    public function render()
    {
        $films = Film::query()
            ->where('type', $this->type)
            ->when($this->genres, function ($query) {
                foreach ($this->genres as $genre) {
                    $query->whereHas('genres', function ($query) use ($genre) {
                        $query->where('name', $genre);
                    });
                }
            })
            ->when($this->sortBy === 'rating', fn($query) => $query->orderBy('average_rating', 'desc'))
            ->when($this->sortBy === 'a-z', fn($query) => $query->orderBy('title', 'asc'))
            ->when($this->sortBy === 'z-a', fn($query) => $query->orderBy('title', 'desc'))
            ->paginate($this->page);

        return view('livewire.explore', ['films' => $films]);
    }

    public function loadMore()
    {
        $this->page += 10;
    }

}
