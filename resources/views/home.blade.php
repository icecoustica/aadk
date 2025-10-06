@extends('layout')

@section('content')
<div class="content">
    <h1>Agensi Dadah Kebangsaan Smart Dashboard</h1>

@php
$video = \App\Models\Video::latest()->first();
$youtubeEmbedUrl = null;

if($video) {
    $youtubeUrl = $video->youtube_url;

    if (str_contains($youtubeUrl, 'youtu.be/')) {
        $parts = explode('/', $youtubeUrl);
        $youtubeId = end($parts);
        $youtubeEmbedUrl = 'https://www.youtube.com/embed/' . $youtubeId;
    } elseif (str_contains($youtubeUrl, 'youtube.com/watch?v=')) {
        $youtubeEmbedUrl = str_replace('watch?v=', 'embed/', $youtubeUrl);
    }
}
@endphp

@if($youtubeEmbedUrl)
<div class="video-container">
    <!-- YouTube Video -->
    <iframe src="{{ $youtubeEmbedUrl }}" frameborder="0"
        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
        allowfullscreen></iframe>

    <!-- Thinglink Video -->
    <iframe src="https://www.thinglink.com/view/scene/2030605661686989668"
        type="text/html" webkitallowfullscreen mozallowfullscreen allowfullscreen scrolling="no">
    </iframe>
</div>
@endif

</div>



@php
$city = urlencode('Kuala Lumpur');
$country = urlencode('Malaysia');
$method = 2;

$response = file_get_contents("https://api.aladhan.com/v1/timingsByCity?city={$city}&country={$country}&method={$method}");
$data = json_decode($response, true);

$timings = $data['data']['timings'] ?? [];
@endphp

<div class="prayer-times">
    <h2>Waktu Solat - Kuala Lumpur</h2>
    <ul>
        @foreach($timings as $name => $time)
            <li>{{ $name }}: {{ $time }}</li>
        @endforeach
    </ul>
</div>




@endsection
