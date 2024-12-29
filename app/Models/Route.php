<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Route extends Model
{
    use HasFactory;

    protected $primaryKey = 'route_id';

    protected $fillable = [
        'route_name',
        'departure_location',
        'destination',
        'distance',
        'duration',
    ];

    public function durationInHours()
    {
        if (!$this->duration) {
            return 0;
        }
        
        $parts = explode(':', $this->duration);
        $hours = intval($parts[0]);
        $minutes = intval($parts[1]);
        $seconds = intval($parts[2]);
        
        return $hours + ($minutes / 60) + ($seconds / 3600);
    }
}

