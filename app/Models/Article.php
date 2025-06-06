<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'image',
        'period',
        'event_date',
        'location',
        'is_published'
    ];

    protected $casts = [
        'event_date' => 'date',
        'is_published' => 'boolean'
    ];
}
