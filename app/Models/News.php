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
}
