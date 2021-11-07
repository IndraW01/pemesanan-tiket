<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    use HasFactory;

    protected $with = ['categories'];

    protected $guarded = [];

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
}
