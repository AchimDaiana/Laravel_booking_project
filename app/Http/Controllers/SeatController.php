<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Seat;
use Illuminate\Http\Request;

class SeatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $seats= Seat::all();
        return view('seats.index',compact('seats'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rooms= Room::all();
        return view('seats.create', compact('rooms'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       /* $request->validate([
            'seat_nr' => 'required',
            'room_id' => 'required'
        ]);
        $input=$request->all();

        Seat::create($input);*/

        $this->validate($request, [
            'seat_nr' => 'required|string|max:255|unique:seats,seat_nr',
            'room_id' => 'required'
        ]);

       Seat::create([
            'seat_nr' => $request->seat_nr,
            'room_id' => $request->room_id,
            'is_booked' => $request->is_booked == true ? '1' :'0'
        ]);

       //dd($request);



        /*return redirect()->back();*/
            /*->with('success','Seat successfully registered.');*/

        return redirect()
            ->route('seats.index')
            ->with('success','Seat created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(Room::where('id',$id)->exists()){
            $room = Room::where('id',$id)->first();
            $seats = Seat::where('room_id',$room->id)->get();
            return view('seats.byroomid',compact('room','seats'));
        }else{
            return redirect('/')->with('status','Not working');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('seats.edit',[
            'seats'=>Seat::find($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {/*
        $request->validate([
            'room_name' => 'required',
            'movie_title' => 'required',
            'movie_description' => 'required'
        ]);

        $room = Room::find($id);
        $input=$request->all();
        if($request->hasFile('image')){
            $destination_path='public/image/rooms';
            $image = $request->file('image');
            $image_name= $image->getClientOriginalName();
            $path = $request->file('image')->storeAs($destination_path,$image_name);

            $input['image'] = $image_name;
        }
        $room->update($input);

        return redirect()
            ->route('rooms.index')
            ->with('success','Room updated successfully.');*/


        /*$this->validate($request, [
            'seat_nr' => 'required|string|max:255',
            'room_id' => 'required'
        ]);

        $seat = Seat::find($id);
        $request->all();

        $seat->update([
            'seat_nr' => $request->seat_nr,
            'room_id' => $request->room_id,
            'is_booked' => $request->is_booked == true ? '1' :'0'
        ]);

        return redirect()
            ->route('rooms.index')
            ->with('success','Room deleted successfully.');*/
        $request->validate([
            'seat_nr' => 'required|unique:seat,seat_nr',
            'room_id' => 'required',
            'is_booked' => 'boolean'
        ]);

        $seat = Seat::find($id);
        $input=$request->all();

        $seat->update($input);

        return redirect()
            ->route('seats.index')
            ->with('success','Seat updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $seat = Seat::find($id);
        $seat->delete();

        return redirect()
            ->route('seats.index')
            ->with('success','Seat deleted successfully.');
    }
}
