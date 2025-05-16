@if($getRecord())
    @php
        $images = json_decode($getRecord()->backgrounds, true);
    @endphp
    <div class="grid grid-cols-3 gap-4">
        @foreach ($images as $image)
            <img src="{{ $image }}" alt="Background Image" class="rounded-lg shadow-md">
        @endforeach
    </div>
@endif
