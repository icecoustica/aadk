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
    
unset($timings['Midnight'], $timings['Firstthird'], $timings['Lastthird']);
@endphp

<div class="row-dashboard">
    {{-- Column 1: Placeholder --}}
    <div class="col">
        <h2>Kadar Penyalahgunaan Dadah Mengikut Negeri (2018–2025)</h2>

    <div class="chart-container">
        <canvas id="drugChart"></canvas>
    </div>

    <!-- 1️⃣ Load Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        const ctx = document.getElementById('drugChart');

        const chart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: @json($labels),
                datasets: @json($datasets),
            },
            options: {
                responsive: true,
                interaction: {
                    mode: 'nearest',
                    intersect: false,
                },
                plugins: {
                    legend: {
                        position: 'bottom',
                    },
                    tooltip: {
                        enabled: true,
                        callbacks: {
                            label: function(context) {
                                return context.dataset.label + ': ' + context.parsed.y.toLocaleString();
                            }
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Jumlah Kes'
                        }
                    },
                    x: {
                        title: {
                            display: true,
                            text: 'Tahun'
                        }
                    }
                }
            }
        });
    </script>
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
    width: 90%;
    height: 45vh;
}

body {
    padding-top: 0px !important;
}
.content {
    padding-bottom: 0px !important;
}

.row-dashboard .col {
    flex: 1;
    background-color: #0f172a;
    padding: 5px;
    border-radius: 10px;
    box-shadow: 0 2px 6px rgba(0,0,0,0.3);
    min-height: 280px;
    text-align: center;
    display: flex;
    flex-direction: column;
    justify-content: center;
}

.row-dashboard {
    margin: 0px !important;
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

        h2 {
            text-align: center;
            color: #fff;
  font-size: 20px;
        }
        .chart-container {
            width: 90%;
            max-width: 1000px;
            margin: 40px auto;
            background: white;
            padding: 25px;
            border-radius: 16px;
            box-shadow: 0 6px 15px rgba(0,0,0,0.1);
        }
        
        
        .video-container {
    display: flex;
    justify-content: space-between;
    gap: 20px;
    width: 95%;
    margin: 20px auto;
    height: 52vh; /* <-- Tinggikan ikut suka. Try 500–600px */
}

.video-container iframe {
    width: 50%;
    height: 100%;
    border: none;
    border-radius: 12px;
}

/* Responsive */
@media (max-width: 900px) {
    .video-container {
        flex-direction: column;
        height: auto;
    }
    .video-container iframe {
        width: 100%;
        height: 300px;
    }
}

/* ===== FIXED 1080P SCREEN FOR TV ===== */ .screen-1080p { width: 1920px; height: 1080px; margin: 0 auto; overflow: hidden; background-color: #0f172a; /* untuk TV */ transform-origin: top left; }

</style>

@endsection
