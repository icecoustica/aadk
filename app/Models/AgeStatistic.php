<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AgeStatistic extends Model
{
      protected $fillable = [
        'age_group',
        'y2018',
        'y2019',
        'y2020',
        'y2021',
        'y2022',
        'y2023',
        'y2024',
        'y2025',
    ];
}
