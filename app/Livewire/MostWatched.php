<?php

namespace App\Livewire;

use App\Models\Film;
use Livewire\Component;

class MostWatched extends Component
{
    public $films;
    public $currentFilm;
    public $name = 'most-watched';

    protected $listeners = ['setCurrentFilmByIndex'];

    public function setCurrentFilmByIndex($index): void
    {
        if (isset($this->films[$index])) {
            $this->currentFilm = $this->films[$index];
        }
    }

    public function mount(): void
    {
        if (!isset($this->films)) {
            $this->films = Film::all();
        }
        $this->currentFilm = $this->films->first();
    }

    public function setCurrentFilm(Film $film): void
    {
        $this->currentFilm = $film;
    }

    public function render()
    {
        return view('livewire.most-watched');
    }
}
