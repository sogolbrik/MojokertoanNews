<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $guarded = ['id'];

    public function kategori()
    {
        return $this->belongsTo(Category::class, 'id_category');
    }

    protected $casts = [
        'waktu' => 'datetime',
    ];

    // public function scopeTrending($query, $limit = 5)
    // {
    //     return $query->orderBy('views', 'desc')->take($limit);
    // }
}
