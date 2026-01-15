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



<div class="tabs">
    <button class="tab-btn active" onclick="openTab('tab1')">Jumlah Keseluruhan</button>
    <button class="tab-btn" onclick="openTab('tab2')">Statistik Umur</button>
    <button class="tab-btn" onclick="openTab('tab3')">Statistik Jantina</button>
    <button class="tab-btn" onclick="openTab('tab4')">Statistik Negeri</button>
    <button class="tab-btn" onclick="openTab('tab5')">Jenis Dadah</button>
</div>








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

<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script>
  const swiper = new Swiper(".mySwiper", {
    loop: true, // supaya slider ulang
    autoplay: {
      delay: 3000, // 3 saat setiap slide
      disableOnInteraction: false, // tetap auto walau user klik
    },
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    slidesPerView: 1,
    spaceBetween: 10,
  });
</script>






<script>
    window.ageGroups = @json($ageGroups ?? []);
    window.ageSeries = @json($ageSeries ?? []);
     window.genderSeries = @json($genderSeries ?? []);
      window.states = @json($states ?? []);
    window.stateSeries = @json($stateSeries ?? []);
     window.drugTypeSeries = @json($drugTypeSeries ?? {});
    window.drugYears = @json($drugYears ?? []);
</script>


@endsection
