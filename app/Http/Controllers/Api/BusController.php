<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Bus;
use App\Models\BusStop;

class BusController extends Controller {

    /**
     * get buses
     * 
     * @return object $bus
     */
    public function getBus()
    {
        $bus = Bus::all();
        return $bus;
    }

    /**
     * get bus stops
     * 
     * @param $busId
     * @return object $busStops
     */
    public function getBusStops($busId)
    {
        $busStops = BusStop::where('bus_id', $busId)->get();
        return $busStops;
    }
}
