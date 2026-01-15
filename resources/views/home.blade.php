@extends('layout')

@section('content')
<div class="content">

    {{-- =========================
        🎥 VIDEO SECTION
    ========================= --}}
    @php
        $video = \App\Models\Video::latest()->first();
        $youtubeEmbedUrl = null;

        if ($video && $video->youtube_url) {
            if (str_contains($video->youtube_url, 'youtu.be/')) {
                $youtubeEmbedUrl = 'https://www.youtube.com/embed/' . last(explode('/', $video->youtube_url));
            } elseif (str_contains($video->youtube_url, 'youtube.com/watch?v=')) {
                $youtubeEmbedUrl = str_replace('watch?v=', 'embed/', $video->youtube_url);
            }
        }
    @endphp

    @if ($youtubeEmbedUrl)
        <div class="video-container">
            <iframe
                src="https://www.thinglink.com/view/scene/2030605661686989668"
                allowfullscreen
                scrolling="no">
            </iframe>

            <iframe
                src="{{ $youtubeEmbedUrl }}"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                allowfullscreen>
            </iframe>
        </div>
    @endif


    {{-- =========================
        🧩 DASHBOARD ROW
    ========================= --}}
    <div class="row-dashboard">

{{-- =====================================================
     COLUMN 1 : CHART + TABS (TAB KHAS DI SINI SAHAJA)
===================================================== --}}
        <div class="col">

{{-- TAB HEADER --}}
            <div class="tabs tabs-local">
                <button class="tab-btn active" data-tab="tab1">Jumlah Keseluruhan</button>
                <button class="tab-btn" data-tab="tab2">Statistik Umur</button>
                <button class="tab-btn" data-tab="tab3">Statistik Jantina</button>
                <button class="tab-btn" data-tab="tab4">Statistik Negeri</button>
                <button class="tab-btn" data-tab="tab5">Jenis Dadah</button>
            </div>

{{-- TAB 1 --}}
            <div id="tab1" class="tab-content active">
                <h2>Jumlah Keseluruhan Penyalahgunaan Dadah (2018–2024)</h2>
                <div class="chart-container">
                    <canvas id="jumlahKeseluruhanChart"></canvas>
                </div>
            </div>
           
{{-- TAB 2 : STATISTIK UMUR --}}
<div id="tab2" class="tab-content">

    <h2>Statistik Umur (Trend 2018–2024)</h2>

    {{-- PILIH KUMPULAN UMUR --}}
    <div style="margin: 10px 0 15px;">
        <label for="ageGroupSelect"><strong>Pilih Kumpulan Umur:</strong></label>
        <select id="ageGroupSelect" style="padding:6px; margin-left:8px;">
            @foreach ($ageGroups as $group)
                <option value="{{ $group }}">{{ $group }}</option>
            @endforeach
        </select>
    </div>

    {{-- CHART --}}
    <div class="chart-container">
        <canvas id="ageChart"></canvas>
    </div>

</div>

{{-- TAB 3 : STATISTIK JANTINA --}}
<div id="tab3" class="tab-content">
    <h2>Statistik Jantina (2018–2024)</h2>

    <div class="chart-container">
        <canvas id="genderChart"></canvas>
    </div>
</div>


{{-- TAB 4 : STATISTIK NEGERI --}}
<div id="tab4" class="tab-content">
    <h2>Statistik Negeri (Trend 2018–2024)</h2>

    <div style="margin-bottom: 15px;">
        <label><strong>Pilih Negeri:</strong></label>
        <select id="stateSelect">
            @foreach ($states as $state)
                <option value="{{ $state }}">{{ $state }}</option>
            @endforeach
        </select>
    </div>

    <div class="chart-container">
        <canvas id="stateChart"></canvas>
    </div>
</div>



{{-- TAB 5 : JENIS DADAH --}}
<div id="tab5" class="tab-content">
    <h2>Jenis Dadah (Mengikut Tahun)</h2>

    <div style="margin-bottom: 15px;">
        <label><strong>Pilih Tahun:</strong></label>
        <select id="drugYearSelect">
            @foreach ($drugYears as $year)
                <option value="{{ $year }}">{{ $year }}</option>
            @endforeach
        </select>
    </div>

    <div class="chart-container">
        <canvas id="drugTypeChart"></canvas>
    </div>
</div>








        </div>
        {{-- ===== END COLUMN 1 ===== --}}


        {{-- =========================
            COLUMN 2 : WAKTU SOLAT
        ========================= --}}
        <div class="col">
            <h2>🕋 Waktu Solat – Kuala Lumpur</h2>

            @php
                $city = urlencode('Kuala Lumpur');
                $country = urlencode('Malaysia');
                $method = 2;

                $response = @file_get_contents(
                    "https://api.aladhan.com/v1/timingsByCity?city={$city}&country={$country}&method={$method}"
                );

                $timings = json_decode($response, true)['data']['timings'] ?? [];
                unset($timings['Midnight'], $timings['Firstthird'], $timings['Lastthird']);
            @endphp

            <ul class="prayer-list">
                @foreach ($timings as $name => $time)
                    <li><strong>{{ $name }}</strong>: {{ $time }}</li>
                @endforeach
            </ul>

            <div class="weather-box" id="weatherBox">
                <p>Loading weather...</p>
            </div>
        </div>


        {{-- =========================
            COLUMN 3 : SLIDESHOW
        ========================= --}}
        <div class="col">
            <div class="swiper mySwiper">
                <div class="swiper-wrapper">
                    @forelse ($images as $image)
                        <div class="swiper-slide">
                            <img src="{{ asset('storage/' . $image->image_path) }}" class="slide-img">
                        </div>
                    @empty
                        <div class="swiper-slide">
                            <p>Tiada imej</p>
                        </div>
                    @endforelse
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>

    </div>
</div>


{{-- =========================
    🌐 DATA → JS (GLOBAL)
========================= --}}
<script>
    window.chartTahun    = @json($tahun);
    window.chartJumlah   = @json($dataJumlah);
    window.chartLabels   = @json($labels ?? []);
    window.chartDatasets = @json($datasets ?? []);
    window.ageGroups = @json($ageGroups ?? []);
    window.ageSeries = @json($ageSeries ?? []);
    window.genderSeries = @json($genderSeries ?? []);
    window.states = @json($states ?? []);
    window.stateSeries = @json($stateSeries ?? []);
     window.drugTypeSeries = @json($drugTypeSeries ?? []);
    window.drugYears = @json($drugYears ?? []);
</script>

{{-- =========================
    📜 LIBRARIES
========================= --}}
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>



{{-- =========================
    🧠 HOME JS
========================= --}}
<script src="{{ asset('js/home.js') }}"></script>







@endsection
