<!-- resources/views/components/posters-preview.blade.php -->
@php
    $posters = json_decode($getState()['posters'], true);
@endphp

@if(is_array($posters))
    <div class="flex space-x-2">
        @foreach($posters as $poster)
            <img src="{{ $poster }}" alt="Poster Image" class="w-16 h-16 rounded-lg">
        @endforeach
    </div>
@endif
