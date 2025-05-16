<?php

namespace App\Livewire;

use App\Models\Film;
use Livewire\Component;

class HomePage extends Component
{
    public $films;
    public $movies;
    public $shows;
    public function mount()
    {
        $this->films = Film::take(20)->get();;
        $this->movies = Film::where('type', 'movie')->orderBy('average_rating', 'desc')->take(12)->get();
        $this->shows = Film::where('type', 'show')->orderBy('average_rating', 'desc')->take(12)->get();
    }
    public function render()
    {
        return view('livewire.home-page');
    }
}
