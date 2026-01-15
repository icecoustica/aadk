document.addEventListener("DOMContentLoaded", function () {

    /* =====================
       STATE
    ===================== */
    let jumlahChart = null;
    let ageChart = null;
    let genderChart = null;
    let stateChart = null;
    let drugTypeChart = null;

    /* =====================
       TAB 1: JUMLAH KESELURUHAN
    ===================== */
    function initJumlahChart() {

        const ctx = document.getElementById('jumlahKeseluruhanChart');
        if (!ctx || typeof Chart === 'undefined') return;

        if (jumlahChart) return;

        jumlahChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: window.chartTahun || [],
                datasets: [{
                    label: 'Jumlah Kes',
                    data: window.chartJumlah || [],
                    borderWidth: 2,
                    tension: 0.4,
                    fill: false,
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: { beginAtZero: true }
                }
            }
        });
    }

    /* =====================
       TAB 2: STATISTIK UMUR
    ===================== */
    function initAgeChart(ageGroup = null) {

        const ctx = document.getElementById('ageChart');
        if (!ctx || typeof Chart === 'undefined') return;

        const groups = window.ageGroups || [];
        const series = window.ageSeries || {};

        if (!groups.length) return;

        const group = ageGroup || groups[0];
        const data = series[group];
        if (!data) return;

        if (ageChart) ageChart.destroy();

        ageChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['2018','2019','2020','2021','2022','2023','2024'],
                datasets: [{
                    label: group,
                    data: data,
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true,
                        title: { display: true, text: 'Jumlah Kes' }
                    },
                    x: {
                        title: { display: true, text: 'Tahun' }
                    }
                }
            }
        });
    }

    /* =====================
       TAB 3: STATISTIK JANTINA
    ===================== */
    function initGenderChart() {

        const ctx = document.getElementById('genderChart');
        if (!ctx || typeof Chart === 'undefined') return;

        if (genderChart) genderChart.destroy();

        const lelaki = window.genderSeries?.['Lelaki'] || [];
        const perempuan = window.genderSeries?.['Perempuan'] || [];

        genderChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['2018','2019','2020','2021','2022','2023','2024'],
                datasets: [
                    {
                        label: 'Lelaki',
                        data: lelaki,
                        borderColor: '#3b82f6',
                        tension: 0.4
                    },
                    {
                        label: 'Perempuan',
                        data: perempuan,
                        borderColor: '#ec4899',
                        tension: 0.4
                    }
                ]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true,
                        title: { display: true, text: 'Jumlah Kes' }
                    },
                    x: {
                        title: { display: true, text: 'Tahun' }
                    }
                }
            }
        });
    }

    /* =====================
       TAB 4: STATISTIK NEGERI
    ===================== */
    function initStateChart(state = null) {

        const ctx = document.getElementById('stateChart');
        if (!ctx || typeof Chart === 'undefined') return;

        if (stateChart) stateChart.destroy();

        const selectedState = state || window.states?.[0];
        if (!selectedState) return;

        stateChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['2018','2019','2020','2021','2022','2023','2024'],
                datasets: [{
                    label: selectedState,
                    data: window.stateSeries[selectedState] || [],
                    borderColor: '#22c55e',
                    tension: 0.4,
                    fill: false
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true,
                        title: { display: true, text: 'Jumlah Kes' }
                    },
                    x: {
                        title: { display: true, text: 'Tahun' }
                    }
                }
            }
        });
    }

    /* =====================
       TAB 5: JENIS DADAH (PIE)
    ===================== */
    function initDrugTypeChart(year = null) {

        const ctx = document.getElementById('drugTypeChart');
        if (!ctx || typeof Chart === 'undefined') return;

        if (drugTypeChart) drugTypeChart.destroy();

        const selectedYear = year || window.drugYears?.[0];
        if (!selectedYear) return;

        const labels = Object.keys(window.drugTypeSeries || {});
        const data = labels.map(
            type => window.drugTypeSeries[type][selectedYear] || 0
        );

        drugTypeChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels,
                datasets: [{
                    data,
                    backgroundColor: [
                        '#ef4444',
                        '#3b82f6',
                        '#22c55e',
                        '#f59e0b',
                        '#a855f7',
                    ],
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: { position: 'bottom' },
                    tooltip: {
                        callbacks: {
                            label: ctx =>
                                `${ctx.label}: ${ctx.parsed.toLocaleString()}`
                        }
                    }
                }
            }
        });
    }

    /* =====================
       TAB SWITCH
    ===================== */
    document.querySelectorAll('.tab-btn').forEach(btn => {
        btn.addEventListener('click', function () {

            document.querySelectorAll('.tab-btn')
                .forEach(b => b.classList.remove('active'));
            document.querySelectorAll('.tab-content')
                .forEach(t => t.classList.remove('active'));

            this.classList.add('active');
            const tabId = this.dataset.tab;
            document.getElementById(tabId)?.classList.add('active');

            if (tabId === 'tab1') initJumlahChart();
            if (tabId === 'tab2') initAgeChart();
            if (tabId === 'tab3') initGenderChart();
            if (tabId === 'tab4') initStateChart();
            if (tabId === 'tab5') initDrugTypeChart();
        });
    });

    /* =====================
       DROPDOWNS
    ===================== */
    document.getElementById('ageGroupSelect')
        ?.addEventListener('change', e => initAgeChart(e.target.value));

    document.getElementById('stateSelect')
        ?.addEventListener('change', e => initStateChart(e.target.value));

    document.getElementById('drugYearSelect')
        ?.addEventListener('change', e => initDrugTypeChart(e.target.value));

    /* =====================
       AUTO LOAD TAB 1
    ===================== */
    initJumlahChart();

    /* =====================
       WEATHER
    ===================== */
    async function loadWeather() {
        try {
            const res = await fetch(
                "https://api.open-meteo.com/v1/forecast?latitude=3.139&longitude=101.6869&current_weather=true"
            );
            const data = await res.json();
            const w = data.current_weather;

            const box = document.getElementById('weatherBox');
            if (!box) return;

            box.innerHTML = `
                <h3>🌤️ Cuaca Kuala Lumpur</h3>
                <p>${w.temperature.toFixed(1)}°C</p>
                <p>💨 Angin: ${w.windspeed} km/h</p>
            `;
        } catch {
            console.warn('Weather API error');
        }
    }
    loadWeather();

    /* =====================
       SWIPER
    ===================== */
    const swiperEl = document.querySelector('.mySwiper');
    if (swiperEl && typeof Swiper !== 'undefined') {
        new Swiper(swiperEl, {
            loop: true,
            autoplay: {
                delay: 3000,
                disableOnInteraction: false,
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
        });
    }

});


