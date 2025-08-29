<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $guarded = ['id'];

    public function berita()
    {
        return $this->belongsTo(News::class, 'id_berita');
    }
}
