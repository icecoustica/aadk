<?php

namespace App\Http\Controllers;

use App\Models\DrugStatistic;

class DrugStatisticController extends Controller
{
    public function index()
    {
        $records = DrugStatistic::all();

        $labels = ['2018','2019','2020','2021','2022','2023','2024','2025'];

        $datasets = $records->map(function ($record) {
            return [
                'label' => $record->state,
                'data' => [
                    $record->year_2018,
                    $record->year_2019,
                    $record->year_2020,
                    $record->year_2021,
                    $record->year_2022,
                    $record->year_2023,
                    $record->year_2024,
                    $record->year_2025,
                ],
                'borderWidth' => 2,
                'fill' => false,
                'tension' => 0.3,
            ];
        });

        return view('home', [
            'labels' => $labels,
            'datasets' => $datasets,
        ]);
    }
}
