<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = ['title', 'image_path'];

    public function getImageUrlAttribute()
    {
        return asset('storage/uploads/images/' . basename($this->image_path));
    }
}
