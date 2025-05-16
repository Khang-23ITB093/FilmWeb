<?php

namespace App\Livewire;

use App\Models\Actor;
use App\Models\Film;
use Livewire\Component;

class PlayPage extends Component
{
    public $films;
    public $film;
    public $actors;
    public $episodes = null;
    public $selectedSeason = 1;
    public function mount($slug){
        $this->film = Film::where('slug', $slug)->firstOrFail();
        $this->films = $this->getSuggestedFilms();
        $this->actors =$this->film->actors;
        if ($this->film->type === 'show')
            $this->episodes = $this->getEpisodesForSeason($this->selectedSeason);
    }

    public function updatedSelectedSeason(): void
    {
        $this->episodes = $this->getEpisodesForSeason($this->selectedSeason);
        $this->dispatch('init-swiper'); // Gửi sự kiện tới browser
    }

    private function getEpisodesForSeason($season)
    {
        return $this->film->seasons()
            ->where('season_number', $season)
            ->firstOrFail()
            ->episodes()
            ->get();
    }

    private function getSuggestedFilms()
    {
        return Film::whereHas('genres', function ($query) {
            $query->whereIn('genre_id', $this->film->genres->pluck('id'));
        })->where('id', '!=', $this->film->id)
            ->orderBy('average_rating', 'desc')
            ->take(12)
            ->get();
    }



    public function render()
    {
        return view('livewire.play-page');
    }
}
