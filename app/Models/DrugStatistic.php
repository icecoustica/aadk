<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class DrugStatistic extends Model
{
      use HasFactory;

     protected $fillable = [
        'state',
        'year_2018',
        'year_2019',
        'year_2020',
        'year_2021',
        'year_2022',
        'year_2023',
        'year_2024',
        'year_2025',
    ];
}

