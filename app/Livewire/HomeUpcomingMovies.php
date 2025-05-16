<?php

namespace App\Livewire;

use App\Models\Film;
use App\Models\Genre;
use App\Models\Movie;
use Livewire\Component;
use App\Models\UpcomingMovie;
use App\Models\UpcomingMovieGenre;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;
use Carbon\Carbon;
use DateTime;

class HomeUpcomingMovies extends Component
{
   public $groupedMovies;
   public $genreMovies;

   public $groupYearsMovies;
   public $selected_year;
   public $selected_genre;

    public function mount()
    {
        $this->genreMovies = Genre::all();
        
        $this->groupYearsMovies = UpcomingMovie::selectRaw('release_year_upcoming as release_year')
        ->distinct()
        ->where('release_year_upcoming', '>=', Carbon::now()->year) // Exclude current year
        ->orderBy('release_year', 'asc')
        ->get();

        
        $year = request()->query('year');

        $this->selected_year = $year ?? Carbon::now()->year; 

        $genreId = request()->query('genre');

        $this->selected_genre =  $this->genreMovies->firstWhere('id', $genreId);

        $filterMovies = UpcomingMovie::where('release_year_upcoming', '=', $this->selected_year);

        if(Carbon::now()->year == $this->selected_year){
            $filterMovies = $filterMovies->where('release_month_upcoming', '>=', Carbon::now()->month);
        }

        if( $this->selected_genre){
            $filterMovies->whereHas('genres', function ($query) use ($genreId) {
                $query->where('genre_id', $genreId);
            });
        }

        $dataMovies = collect($filterMovies // Exclude current year
        ->get());
    
        // Group by both year and month
        $groupedMovies = $dataMovies->groupBy(function($movie) {
            return $movie->release_year_upcoming.str_pad($movie->release_month_upcoming, 2, '0', STR_PAD_LEFT);
        });

        // Now, sort movies within each group by the actual release date
        $groupedMovies = $groupedMovies->map(function ($movies) {
            // Assuming you have a `release_date` field, sort the movies by date
            return $movies->sortBy('release_day_upcoming');  // or 'release_day_upcoming' if you have a specific day field
        });

        $this->groupedMovies = $groupedMovies->sortKeys();

        $show_all = request()->query('show');
        if(! $show_all || $show_all != 'all')
       {
        $this->groupedMovies = $this->groupedMovies->take(3);
       }
        
    }

    public function render()
    {
        

    return view('livewire.upcoming-movies');
    }

    public function convertYearMonthToMonthName($yearMonth) {

        // Ensure the input is exactly 6 characters and numeric
        if (strlen($yearMonth) !== 6 || !is_numeric($yearMonth)) {
            return "Invalid format. Please provide a 'YYYYMM' string.";
        }
    
        // Create a DateTime object from the year-month string
        $date = DateTime::createFromFormat("Ym", $yearMonth);
        
        // Return the formatted month name (e.g., "January")
        return $date ? $date->format("F") : "Invalid date format.";
    }
    

}
