<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
   use HasFactory;

    protected $primaryKey = 'reservation_id';

    protected $fillable = [
        'schedule_id',
        'passenger_name',
        'contact_information',
        'seat_number',
        'reservation_date',
        'status',
    ];

     public function schedule()
    {
        return $this->belongsTo(Schedule::class, 'schedule_id');
    }

}
