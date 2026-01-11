<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JumlahKeseluruhan extends Model
{
    protected $fillable = [
        'label',
        'y2018',
        'y2019',
        'y2020',
        'y2021',
        'y2022',
        'y2023',
        'y2024',
    ];
}
