@extends('layout')

@section('content')
<div class="content">

    {{-- ======================================
        🎥 Thinglink & YouTube Section
    ======================================= --}}
    @php
        $video = \App\Models\Video::latest()->first();
        $youtubeEmbedUrl = null;

        if ($video) {
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

    @if ($youtubeEmbedUrl)
        <div class="video-container">
            <iframe src="https://www.thinglink.com/view/scene/2030605661686989668"
                webkitallowfullscreen mozallowfullscreen allowfullscreen scrolling="no">
            </iframe>

            <iframe src="{{ $youtubeEmbedUrl }}" frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                allowfullscreen>
            </iframe>
        </div>
    @endif


    {{-- ======================================
     🕌 Row 3 Column Dashboard Section
======================================= --}}
@php
    $city = urlencode('Kuala Lumpur');
    $country = urlencode('Malaysia');
    $method = 2;

    $response = file_get_contents("https://api.aladhan.com/v1/timingsByCity?city={$city}&country={$country}&method={$method}");
    $data = json_decode($response, true);

    $timings = $data['data']['timings'] ?? [];
@endphp

<div class="row-dashboard">
    {{-- Column 1: Placeholder --}}
    <div class="col">
        <img src="https://placehold.co/350x250?text=Placeholder+Image" alt="Placeholder">
    </div>

    {{-- Column 2: Waktu Solat --}}
    <div class="col">
        <h2>🕋 Waktu Solat - Kuala Lumpur</h2>
        <ul class="prayer-list">
            @foreach ($timings as $name => $time)
                <li><strong>{{ $name }}</strong>: {{ $time }}</li>
            @endforeach
        </ul>
        {{-- 🌤️ Cuaca Kuala Lumpur --}}
    <div class="weather-box" id="weatherBox">
        <p>Loading weather...</p>
    </div>
    </div>

    {{-- Column 3: Slideshow --}}
    <div class="col">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
        <div class="swiper mySwiper">
            <div class="swiper-wrapper">
                @foreach ($images as $image)
                    <div class="swiper-slide">
                        <img src="{{ asset('storage/' . $image->image_path) }}" class="slide-img" />
                    </div>
                @endforeach
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script>
    new Swiper('.mySwiper', {
        loop: true,
        autoplay: { delay: 2500 },
        pagination: { el: '.swiper-pagination' },
         slidesPerView: 1, // <-- tambah ni!
        spaceBetween: 0,
    });
</script>

<script>
    // 🌤️ Ambil cuaca Kuala Lumpur (Open-Meteo)
    async function loadWeather() {
        const response = await fetch("https://api.open-meteo.com/v1/forecast?latitude=3.139&longitude=101.6869&current_weather=true");
        const data = await response.json();
        const weather = data.current_weather;

        const weatherBox = document.getElementById('weatherBox');
        const temperature = weather.temperature.toFixed(1);
        const windspeed = weather.windspeed;
        const weatherCode = weather.weathercode;

        const weatherDesc = {
            0: "☀️ Clear sky",
            1: "🌤️ Mainly clear",
            2: "⛅ Partly cloudy",
            3: "☁️ Overcast",
            45: "🌫️ Fog",
            48: "🌫️ Depositing rime fog",
            51: "🌦️ Drizzle",
            61: "🌧️ Rain",
            71: "🌨️ Snow",
            95: "⛈️ Thunderstorm"
        };

        weatherBox.innerHTML = `
            <h3>🌤️ Cuaca Kuala Lumpur</h3>
            <p>${weatherDesc[weatherCode] || "🌡️"} — ${temperature}°C</p>
            <p>💨 Angin: ${windspeed} km/h</p>
        `;
    }

    loadWeather();
</script>

<style>
   /* ===== FLEX 3-COLUMN LAYOUT ===== */
.row-dashboard {
    display: flex;
    flex-wrap: nowrap;
    justify-content: space-between;
    align-items: stretch;
    gap: 20px;
    margin: 40px auto;
    width: 95%;
}

.row-dashboard .col {
    flex: 1;
    background-color: #0f172a;
    padding: 15px;
    border-radius: 10px;
    box-shadow: 0 2px 6px rgba(0,0,0,0.3);
    min-height: 280px;
    text-align: center;
    display: flex;
    flex-direction: column;
    justify-content: center;
}

/* ===== Image in Left Column ===== */
.row-dashboard img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    border-radius: 8px;
}

/* ===== Prayer List ===== */
.prayer-list {
    list-style: none;
    padding: 0;
    margin: 0;
    text-align: center;
}
.prayer-list li {
    margin-bottom: 8px;
}

/* ===== SLIDER STYLING ===== */
.swiper {
    width: 100%;
    height: 100%;
    overflow: hidden;
    border-radius: 8px;
    position: relative;
}

.swiper-wrapper {
    width: 100% !important;
    display: flex;
    flex-wrap: nowrap;
}

.swiper-slide {
    width: 100% !important; /* wajib supaya tak meleret ke tepi */
    flex-shrink: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100%;
}

.slide-img {
    width: 100%;
    height: 100%;
    object-fit: scale-down;
    border-radius: 8px;
    background-color: #0f172a;
}

/* ===== Responsive ===== */
@media (max-width: 900px) {
    .row-dashboard {
        flex-direction: column;
    }
}

/* ===== WEATHER BOX ===== */
.weather-box {
    margin-top: 15px;
    background-color: #1e293b;
    padding: 10px;
    border-radius: 8px;
    font-size: 0.95rem;
    color: #e2e8f0;
    box-shadow: inset 0 0 5px rgba(0,0,0,0.3);
}
.weather-box h3 {
    margin-bottom: 8px;
    color: #38bdf8;
}
.weather-box p {
    margin: 3px 0;
}

</style>

@endsection
