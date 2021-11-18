<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SeatUser extends Model
{
    use HasFactory;

    protected $table = 'seat_user';

    protected $with = ['seat'];

    protected $guarded = [];

    public function seat()
    {
        return $this->belongsTo(Seat::class);
    }
}
