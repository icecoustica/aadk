<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Video extends Model
{
       use HasFactory;

    // Tambah property $fillable
    protected $fillable = [
        'title',
        'youtube_url',
    ];
}
