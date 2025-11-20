<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GenderStatistic extends Model
{
     protected $fillable = [
        'gender',
        '2018',
        '2019',
        '2020',
        '2021',
        '2022',
        '2023',
        '2024',
        '2025',
    ];
}
