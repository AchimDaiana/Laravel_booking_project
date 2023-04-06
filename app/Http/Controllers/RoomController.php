<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Seat;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rooms= Room::all();
        return view('rooms',compact('rooms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('rooms.create');
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
            'room_name' => 'required',
            'movie_title' => 'required',
            'movie_description' => 'required'
        ]);
        $input=$request->all();
        if($request->hasFile('image')){
            $destination_path='public/image/rooms';
            $image = $request->file('image');
            $image_name= $image->getClientOriginalName();
            $path = $request->file('image')->storeAs($destination_path,$image_name);

            $input['image'] = $image_name;
        }


        Room::create($input);


        return redirect()
            ->route('rooms.index')
            ->with('success','Room successfully registered.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $room = Room::find($id);
        if ($room === null) {
            return response('No room has been found.', 404);
        }

        return view('rooms.show', compact('room'));
    }




    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('rooms.edit',[
            'room'=>Room::find($id)]);
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
            ->with('success','Room updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $room = Room::find($id);
        $room->delete();

        return redirect()
            ->route('rooms.index')
            ->with('success','Room deleted successfully.');

    }
}
