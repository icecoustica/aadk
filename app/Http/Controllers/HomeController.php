<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\DrugStatistic;

class HomeController extends Controller
{
    public function index()
    {
        $images = Image::latest()->get();
        $statistics = DrugStatistic::select(
            'state',
            'year_2018',
            'year_2019',
            'year_2020',
            'year_2021',
            'year_2022',
            'year_2023',
            'year_2024',
            'year_2025'
        )->get();

        // Senarai tahun untuk pakai di chart
        $labels = ['2018', '2019', '2020', '2021', '2022', '2023', '2024', '2025'];

        // Convert setiap negeri jadi dataset
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
                    $item->year_2025,
                ],
                'borderColor' => '#' . substr(md5($item->state), 0, 6),
                'tension' => 0.3,
                'fill' => false,
            ];
        });

        return view('home', compact('images', 'labels', 'datasets'));
    }
}
