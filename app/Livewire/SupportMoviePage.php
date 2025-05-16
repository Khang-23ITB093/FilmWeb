<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\UpcomingMovie;

class SupportMoviePage extends Component
{
    public function render()

    {
        $items = UpcomingMovie::take(20)->get();

        // Order by year and month

        return view('livewire.support-movie-page' ,['items'=> $items]);
    }

}
