<?php

// app/Models/Booking.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    // Add seat_id to fillable
    protected $fillable = [
        'seat_id',
        'customer_name',
    ];
}
