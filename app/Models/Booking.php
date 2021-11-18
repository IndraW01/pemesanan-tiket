<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $with = ['seats', 'film', 'schedule'];

    public function seats()
    {
        return $this->hasMany(SeatUser::class);
    }

    public function film()
    {
        return $this->belongsTo(Film::class);
    }

    public function schedule()
    {
        return $this->belongsTo(Schedule::class);
    }
}
