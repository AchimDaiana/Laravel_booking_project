@extends('components.layout')

<div class="row">
    <img src="{{asset('/storage/image/rooms/cinemascreen.jpg')}}" alt="Screen"  width="1000" height="500">
</div>

@if ($message = Session::get('success'))
    <div x-data="{show:true}"
         x-init="setTimeout(()=>show = false, 4000)"
         x-show="show"
         class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif
<div class="text-center">
    <div class="row row-cols-1 row-cols-md-3 g-4 mx-5 px-5">
        @foreach ($seats as $seat)
            <div class="col" >
                <div class="col-sm-6">
                    @if($seat->is_booked === 0)
                        <div class="p-3 border bg-success ">{{$seat->seat_nr}}</div>
                    @else
                        <div class="p-3 border bg-danger ">{{$seat->seat_nr}}</div>
                    @endif
                    <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                        @can('admin')
                            <a class="btn btn-primary" href="{{ route('seats.edit',$seat->id) }}">Edit</a>
                            <form  action="{{ route('seats.destroy', $seat->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit"  class="btn btn-danger">Delete</button>
                            </form>
                        @endcan
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>



@can('admin')
    <div style="position:fixed; right: 25px; bottom:15px;">
        <a href="{{route('seats.create')}}" class="btn btn-warning"><i class="bi bi-clipboard2-plus">Add new seat</i></a>
    </div>
    <div style="position:fixed; left: 25px; bottom:15px;">
    <a href="/" class="btn btn-primary">Back to list</a>
    </div>
@endcan
