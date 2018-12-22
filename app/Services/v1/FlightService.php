<?php 

namespace App\Services\v1;
use App\Flight;

class FlightService
{
    public function getFlights()
    {
        return Flight::all();
    }

    public function getFlight($flightNumber)
    {
        return Flight::where('flightNumber', $flightNumber)->get();
    }
}