<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\DrugStatistic;
use App\Models\JumlahKeseluruhan;
use App\Models\AgeStatistic;
use App\Models\GenderStatistic;

class HomeController extends Controller
{
    public function index()
    {
        // =====================
        // TAB 1: Jumlah Keseluruhan
        // =====================
        $jumlah = JumlahKeseluruhan::first();

        $tahun = ['2018','2019','2020','2021','2022','2023','2024'];

        $dataJumlah = $jumlah ? [
            $jumlah->y2018,
            $jumlah->y2019,
            $jumlah->y2020,
            $jumlah->y2021,
            $jumlah->y2022,
            $jumlah->y2023,
            $jumlah->y2024,
        ] : [];


        // =====================
        // SLIDESHOW IMAGES
        // =====================
        $images = Image::latest()->get();


        // =====================
        // CHART NEGERI (OLD / TAB LAIN)
        // =====================
        $statistics = DrugStatistic::select(
            'state',
            'year_2018',
            'year_2019',
            'year_2020',
            'year_2021',
            'year_2022',
            'year_2023',
            'year_2024'
        )->get();

        $labels = ['2018', '2019', '2020', '2021', '2022', '2023', '2024'];

        $datasets = $statistics->map(function ($item) {
            return [
                'label' => $item->state,
                'data' => [
                    $item->year_2018,
                    $item->year_2019,
                    $item->year_2020,
                    $item->year_2021,
                    $item->year_2022,
                    $item->year_2023,
                    $item->year_2024,
                ],
                'borderColor' => '#' . substr(md5($item->state), 0, 6),
                'tension' => 0.3,
                'fill' => false,
            ];
        });


// =====================
// TAB 2: STATISTIK UMUR (TREND 2018–2024)
// =====================
$ageStats = AgeStatistic::orderBy('id')->get();

$ageSeries = [];

foreach ($ageStats as $item) {
    $ageSeries[$item->age_group] = [
        (int) $item->y2018,
        (int) $item->y2019,
        (int) $item->y2020,
        (int) $item->y2021,
        (int) $item->y2022,
        (int) $item->y2023,
        (int) $item->y2024,
    ];
}

$ageGroups = array_keys($ageSeries);


// =====================
// TAB 3: STATISTIK JANTINA (2018–2024)
// =====================
$genderStats = GenderStatistic::orderBy('gender')->get();

$genderSeries = [];

foreach ($genderStats as $item) {
    $genderSeries[$item->gender] = [
        (int) $item->y2018,
        (int) $item->y2019,
        (int) $item->y2020,
        (int) $item->y2021,
        (int) $item->y2022,
        (int) $item->y2023,
        (int) $item->y2024,
    ];
}

// =====================
// TAB 4: STATISTIK NEGERI (TREND 2018–2024)
// =====================
$stateStats = DrugStatistic::orderBy('state')->get();

$stateSeries = [];

foreach ($stateStats as $item) {
    $stateSeries[$item->state] = [
        (int) $item->year_2018,
        (int) $item->year_2019,
        (int) $item->year_2020,
        (int) $item->year_2021,
        (int) $item->year_2022,
        (int) $item->year_2023,
        (int) $item->year_2024,
    ];
}

$states = array_keys($stateSeries);


// =====================
// TAB 5: JENIS DADAH (PIE CHART)
// =====================
$drugTypes = \App\Models\JenisDadah::orderBy('jenis_dadah')->get();

$drugTypeSeries = [];

foreach ($drugTypes as $item) {
    $drugTypeSeries[$item->jenis_dadah] = [
        '2018' => (int) $item->y2018,
        '2019' => (int) $item->y2019,
        '2020' => (int) $item->y2020,
        '2021' => (int) $item->y2021,
        '2022' => (int) $item->y2022,
        '2023' => (int) $item->y2023,
        '2024' => (int) $item->y2024,
    ];
}

$drugYears = ['2018','2019','2020','2021','2022','2023','2024'];


        // =====================
        // SATU RETURN SAHAJA
        // =====================
        return view('home', compact(
            'tahun',
            'dataJumlah',
            'images',
            'labels',
            'datasets',
            'ageGroups',
            'genderSeries',
            'states',
            'stateSeries',
            'drugTypeSeries',
            'drugYears',
            'ageSeries'
        ));



    }
}
