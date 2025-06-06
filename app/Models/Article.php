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
        'is_published',
        'id_stage'
    ];

    /**
     * Thiết lập quan hệ với bảng stages
     */
    public function stage(): BelongsTo
    {
        return $this->belongsTo(Stage::class, 'id_stage');
    }
}
