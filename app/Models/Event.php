<?php

namespace App\Models;

use App\Models\EventImage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'title',
        'description',
        'speaker',
    ];

    public function eventImages() {
        return $this->hasMany(EventImage::class);
    }
}
