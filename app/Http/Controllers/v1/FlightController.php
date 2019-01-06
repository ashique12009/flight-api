<?php

namespace App\Http\Controllers\v1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\v1\FlightService;

class FlightController extends Controller
{

    protected $flights;

    public function __construct(FlightService $service)
    {
        $this->flights = $service;

        $this->middleware('auth:api', ['only' => ['store', 'update', 'delete']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //call service
        $data = $this->flights->getFlights();
        //return data
        return response()->json($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try
        {
            $flight = $this->flights->createFlight($request);
            return response()->json($flight, 201);
        }
        catch(Exception $e)
        {
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //call service
        $data = $this->flights->getFlight($id);
        //return data
        return response()->json($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try
        {
            $flight = $this->flights->updateFlight($request, $id);
            return response()->json($flight, 200);
        }
        catch(Exception $e)
        {
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try
        {
            $flight = $this->flights->deleteFlight($request, $id);
            return response()->make('', 204);
        }
        catch(Exception $e)
        {
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }
}
