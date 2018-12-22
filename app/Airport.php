<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Airport extends Model
{
    public function arrivingFlight()
    {
        return $this->hasMany('App\Flight', 'arrivalAirport_id');
    }
    
    public function departingFlight()
    {
        return $this->hasMany('App\Flight', 'departureAirport_id');
    }
}
