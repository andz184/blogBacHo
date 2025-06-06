<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Article extends Model
{
    use HasFactory;

    /**
     * Các trường có thể được gán hàng loạt
     */
    protected $fillable = [
        'title',
       
        'content',
        'image',
        'period',
        'event_date',
        'location',
        'is_published',
        'category_id'
    ];

    /**
     * Các trường cần cast
     */
    protected $casts = [
        'event_date' => 'date',
        'is_published' => 'boolean'
    ];

    /**
     * Thiết lập quan hệ với bảng categories
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
