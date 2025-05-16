<div>
    <x-home-slider :films="$films" />
    <x-small-slider :films="\App\Models\Film::latest()->limit(12)->get()" title="Latest Releases" />
    <x-small-slider :films="\App\Models\Film::take(12)->orderBy('average_rating')->get()" title="Trending films & Shows" name="trending" />
    <livewire:most-watched :films="$films" name="most-watched"/>
    <x-medium-slider :films=" $movies " name="movies" title="Movies" nav="true"/>
    <x-medium-slider :films=" $shows " name="shows" title="Shows" nav="true"/>
    <livewire:genres-slider name="genres"/>
</div>

