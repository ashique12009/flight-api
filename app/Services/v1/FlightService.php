<?php 

namespace App\Services\v1;
use App\Flight;
use Auth;

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

    public function createFlight($req)
    {
        $flight = new Flight();
        $flight->flightNumber = $req->input('flightNumber');
        $flight->status = $req->input('status');
        $flight->arrivalAirport_id = $req->input('arrivalAirport_id');
        $flight->arrivalDateTime = $req->input('arrival.datetime');
        $flight->departureAirport_id = $req->input('departureAirport_id');
        $flight->departureDateTime = $req->input('departure.datetime');
        $flight->user_id = $req->input('user_id');

        $flight->save();
        return $flight;
    }
}