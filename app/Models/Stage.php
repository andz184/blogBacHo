<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Stage extends Model
{
    use HasFactory;

    /**
     * Các trường có thể được gán hàng loạt
     */
    protected $fillable = [
        'name',
        'description',
        'status'
    ];

    /**
     * Thiết lập quan hệ với bảng articles
     */
    public function articles(): HasMany
    {
        return $this->hasMany(Article::class, 'id_stage');
    }
}
