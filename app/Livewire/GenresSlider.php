<?php

namespace App\Livewire;

use App\Models\Film;
use App\Models\Genre;
use Livewire\Component;

class GenresSlider extends Component
{
    public $currentFilm;
    public $name = 'genres';
    public $genres;
    public $selectedFilms = [];
    protected $listeners = ['setCurrentFilmByIndexGenres'];

    public function mount()
    {
        $this->genres = Genre::all();
        $existingFilmIds = [];
        foreach ($this->genres as $genre) {
            $film = $this->getUniqueFilmForGenre($genre, $existingFilmIds);

            if ($film) {
                $this->selectedFilms[] = $film;
                $existingFilmIds[] = $film->id;
            }
        }

        $this->currentFilm = $this->selectedFilms[0] ?? $this->genres->first()->films->first();
    }

    private function getUniqueFilmForGenre($genre, $existingFilmIds)
    {
        $films = $genre->films()->orderByDesc('average_rating')->get();

        foreach ($films as $film) {
            if (!in_array($film->id, $existingFilmIds)) {
                return $film;
            }
        }

        return null;
    }

    public function setCurrentFilmByIndexGenres($index)
    {
        if (isset($this->selectedFilms[$index])) {
            $this->currentFilm = $this->selectedFilms[$index];
        }
    }

    public function render()
    {
        return view('livewire.genres-slider');
    }
}
