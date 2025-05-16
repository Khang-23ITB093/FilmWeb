<?php

use App\Http\Controllers\VNPay;
use App\Livewire\ForgotPassword;
use App\Livewire\HomePage;
use App\Livewire\LoginPage;
use App\Livewire\PlayPage;
use App\Livewire\RegisterPage;
use App\Livewire\ResetPassword;
use App\Livewire\HomeUpcomingMovies;
use App\Livewire\Search;
use App\Livewire\Service;
use App\Livewire\ShowMoviePage;
use App\Livewire\SupportMoviePage;
use App\Livewire\ProfilePage;

use App\Livewire\SubscriptionPage;
use  App\Livewire\Explore;
use Filament\Facades\Filament;
use Illuminate\Support\Facades\Route;

Route::get('/', HomePage::class);
Route::get('/watch/{slug}', ShowMoviePage::class);
Route::get('/watch/{slug}/season/{season}/episode/{episode}', ShowMoviePage::class);
Route::get('/watch/{slug}/episode/{episode}', ShowMoviePage::class);
Route::get('/search', Search::class);
Route::get('/search/{search}', Search::class);
Route::get('/explore/{type}', Explore::class)
    ->where('type', 'movie|show')
    ->name('{type}');
Route::get('/explore', function () {
    return redirect('/explore/movie');
});

Route::post('/logout', function () {
    auth()->logout();
    return redirect('/');
});


Route::get('/subscription', SubscriptionPage::class)->name('subscription');
Route::get('/UpcomingMoves-page', HomeUpcomingMovies::class);
Route::get('/support-page', SupportMoviePage::class);
Route::get('/show-movie-page', ShowMoviePage::class);
Route::post('/vnpay',[VNPay::class,'payment'])->name('vnpay');
Route::get('/vnpay-return', [VNPay::class, 'vnpayReturn'])->name('vnpay.return');

Route::get('/profile/{id}', ProfilePage::class)->name('profile.page');
Route::match(['get', 'post'],'/subscription-page/{name}', Service::class);


Route::middleware('guest')->group(function () {
    Route::get('/film/{slug}', PlayPage::class);
    Route::get('/login', LoginPage::class)->name('login');
    Route::get('/register', RegisterPage::class)->name('register');
    Route::get('/forgot-password', ForgotPassword::class)->name('password.request');
    Route::get('/reset/{token}/{email}', ResetPassword::class)->name('password.reset');
});

Route::middleware(['role'=>'admin'])->group(function () {
    Route::get('/filament', function () {
        return Filament::render();
    });
});


Route::middleware(['auth'])->group(function () {
    Route::match(['get', 'post'],'/subscription-page/{name}', Service::class);
});



