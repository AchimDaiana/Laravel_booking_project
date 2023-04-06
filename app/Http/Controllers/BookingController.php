<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Room;
use App\Models\Seat;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $bookings=Booking::all();
        return view('bookings.index',compact('bookings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $seats=Seat::all();
        $rooms=Room::all();
        return view('bookings.create',compact('seats','rooms'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'time_from' => 'required',
            'time_to' => 'required',
            'seat_id' => 'required',
            'room_id' => 'required',

        ]);
        $input=$request->all();

        Booking::create($input);
/*
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'time_from' => 'required',
            'time_to' => 'required',
            'seat_id' => 'required'
        ]);

        Seat::create([
            'name' => $request->name,
            'email' => $request->email,
            'time_from' => $request->time_from,
            'time_to' => $request->time_to,
            'seat_id' => $request->seat_id,
        ]);*/



        return redirect()
            ->route('bookings.index')
            ->with('success','Booking successfully registered.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
