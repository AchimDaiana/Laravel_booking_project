<?php


use App\Http\Controllers\BookingController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SeatController;
use App\Http\Controllers\SessionsController;
use App\Models\Room;
use App\Models\Seat;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoomController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',[RoomController::class,'index']);
Route::resource('rooms',RoomController::class)->middleware('admin');
Route::get('register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('register', [RegisterController::class, 'store'])->middleware('guest');


Route::get('login',[SessionsController::class,'create'])->middleware('guest');
Route::post('login',[SessionsController::class,'store'])->middleware('guest');
Route::post('logout', [SessionsController::class,'destroy'])->middleware('auth');



Route::resource('seats',SeatController::class);
Route::get('/rooms/{id}/seats',[SeatController::class,'show'])->name('roomseats');

Route::resource('bookings',BookingController::class);

/*Route::get('/', function () {
    return view('rooms', [
        'rooms'=> Room:: all()
    ]);
});*/




/*Route::get('rooms/{room}/seats',function ($id){

    return view('seats',[
        'room'=> Room::find($id),
        'seats'=> Seat:: all()
    ]);

});*/
/*->where('room','[a-zA-Z0-9_\-]+')*/;

