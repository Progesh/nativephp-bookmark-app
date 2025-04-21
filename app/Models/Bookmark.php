<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bookmark extends Model
{
    protected $table = 'bookmarks';

    protected $fillable = [
        'url',
        'username',
        'password',
        'category_id',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
