<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';

    protected $fillable = ['name', 'description'];

    public function bookmarks()
    {
        return $this->hasMany(Bookmark::class);
    }
}
