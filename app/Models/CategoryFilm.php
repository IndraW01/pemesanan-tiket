<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryFilm extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = 'category_film';
}
