<?php

namespace App\Http\Controllers;

use App\Models\Trip;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use DateTime;
use DateTimeZone;
use Illuminate\Support\Arr;

class TripController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */




    public function recentlytrips()
    {
        $trip = DB::select('select * from trips where TimeEnd="1" ');
        return json_encode($trip);
    }
    public function currentlytrips()
    {
        $date = Carbon::now();
        $dt = new DateTime($date);
        $tz = new DateTimeZone('Asia/Damascus');
        $dt->setTimezone($tz);
        $currenttime = $dt->format('Y-m-d H:i:s');
        $trip = DB::select("select * from trips where TimeEnd='0' &&  TimeStart < '$currenttime'");
        return $trip;
    }
    public function upcomingtrips()
    {
    
        $date = Carbon::now();
        $dt = new DateTime($date);
        $tz = new DateTimeZone('Asia/Damascus');
        $dt->setTimezone($tz);
        $currenttime = $dt->format('Y-m-d H:i:s');
        $trip = DB::select("select * from trips where '$currenttime'<TimeStart ");
        return json_encode($trip);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Trip  $trip
     * @return \Illuminate\Http\Response
     */
    public function show(Trip $trip)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Trip  $trip
     * @return \Illuminate\Http\Response
     */
    public function edit(Trip $trip)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Trip  $trip
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Trip $trip)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Trip  $trip
     * @return \Illuminate\Http\Response
     */
    public function destroy(Trip $trip)
    {
        //
    }
}
