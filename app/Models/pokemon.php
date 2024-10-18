<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class pokemon extends Model
{
    use HasFactory;
    protected $filable  = [
        'name',
        'species',
        'primary_type',
        'weight',
        'height',
        'hp',
        'attack',
        'defense',
        'is_legendary',
        'photo'
    ];

    protected $append = [
        'photo_url',

    ];
    public function getPhotoUrlAttribute()
    {
        if (filter_var($this->photo, FILTER_VALIDATE_URL)) {
            return $this->photo;
        }
        if (str_starts_with($this->photo, 'public/')) {
            return asset(str_replace('public/', '', $this->photo));
        }
        if ($this->photo) {
            return Storage::url($this->photo);
        }
        return 'https://placehold.co/600x400';
}
}