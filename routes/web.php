
<?php

use App\Http\Controllers\AccupationController;
use App\Http\Controllers\AdditionalItemController;
use App\Http\Controllers\CheckInController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\FloorController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\PriceRateTypeController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\RoomTypeController;
use App\Http\Controllers\RoomViewController;
use App\Http\Controllers\SourceTravelAgentController;
use App\Http\Controllers\StatusRoomController;
use App\Http\Controllers\TravelAgentController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index', ['title' => "dashboard"]);
});


// Route::resource('master-data/status-room', StatusRoomController::class);
Route::resource('master-data/produk', ProdukController::class);
Route::resource('master-data/item', ItemController::class);
Route::resource('master-data/customer', CustomerController::class);
// Route::resource('master-data/price-rate-type', PriceRateTypeController::class);
// Route::resource('master-data/travel-agent', TravelAgentController::class);
// Route::resource('master-data/source-travel-agent', SourceTravelAgentController::class);
// Route::resource('master-data/additional-item', AdditionalItemController::class);
// Route::resource('master-data/room', RoomController::class);
// Route::resource('master-data/occupation', AccupationController::class);
// Route::resource('master-data/guest', GuestController::class);



// Route::resource('front-office/room-view', RoomViewController::class);
// Route::get('front-office/room-view/check-in/{id}', [RoomViewController::class, 'checkIn'])->name('check-in');



// Route::resource('check/check-in', CheckInController::class);
