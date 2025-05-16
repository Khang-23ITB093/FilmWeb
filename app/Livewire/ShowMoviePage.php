<?php

namespace App\Livewire;

use App\Models\Film;
use App\Models\Rating;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\Comment;


class ShowMoviePage extends Component
{
    public $film;
    public $films;
    public $episode = null;
    public $episodes = null;
    public $selectedSeason;
    public $comments;
    public $comment_content='';

    public function mount($slug, $season = null, $episode = null)
    {
        if (!Auth::check())
            $this->redirect('/login');
        // Lấy film theo slug
        $this->film = Film::where('slug', $slug)->firstOrFail();
        $this->comments = Comment::where('film_id', $this->film->id)->get() ?? null;


        // Nếu là show và không có season/episode, điều hướng đúng URL
        if ($this->film->type === 'show' && !$season && !$episode) {
            if ($this->film->hasManySeasons()) {
                return redirect()->to("/watch/{$slug}/season/1/episode/1");
            }
            return redirect()->to("/watch/{$slug}/episode/1");
        }

        // Xử lý episode khi có season và episode
        if ($season && $episode) {
            $this->loadEpisode($season, $episode);
        } elseif ($episode) { // Khi chỉ có episode
            $this->loadEpisode(1, $episode); // Mặc định season = 1
        }

        // Lấy danh sách episode của season đang chọn
        if ($this->selectedSeason) {
            $this->episodes = $this->getEpisodesForSeason($this->selectedSeason);
        }

        // Gợi ý các phim cùng thể loại
        $this->films = $this->getSuggestedFilms();
        $this->selectedSeason = $season ?? 1;
    }

    private function loadEpisode($season, $episode)
    {
        $seasonModel = $this->film->seasons()
            ->where('season_number', $season)
            ->firstOrFail();

        $this->episode = $seasonModel->episodes()
            ->where('episode_number', $episode)
            ->firstOrFail();

        $this->selectedSeason = $season;
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

    public function updatedSelectedSeason()
    {
        $this->episodes = $this->getEpisodesForSeason($this->selectedSeason);
        $this->dispatch('init-swiper'); // Gửi sự kiện tới browser
    }

    public function selectRating($rating)
    {
        //add rating to film by user
        Rating::updateOrCreate(
            ['user_id' => Auth::id(), 'film_id' => $this->film->id],
            ['rating' => $rating]
        );
        //update film average rating
        $this->film->updateOrCreate(
            ['id' => $this->film->id],
            ['average_rating' => Rating::where('film_id', $this->film->id)->avg('rating')]
        );
        $this->film->refresh();

        $this->dispatch('init-swiper');
    }

    public function play()
    {
        if (!auth()->check()) {
            return redirect()->route('login');
        }
        $user = auth()->user();
        $user->load('subscription.subscription');

        // Kiểm tra nếu subscription tồn tại và kiểm tra tên gói
        if ($user->subscription && $user->subscription->subscription && $user->subscription->subscription->name == 'free') {
            return redirect('/subscription-page');
        }
        return redirect('/show-movie-page');
    }

    public function postComment()
    {
        if (!auth()->check()) {
            return redirect()->route('login');
        }
        $user = auth()->user();
        Comment::create([
            'user_id' => $user->id,
            'film_id' => $this->film->id,
            'comment' => $this->comment_content
        ]);
        $this->comment_content = '';
        $this->comments = Comment::where('film_id', $this->film->id)->get();

    }

    public function render()
    {

        return view('livewire.show-movie-page');
    }
}
