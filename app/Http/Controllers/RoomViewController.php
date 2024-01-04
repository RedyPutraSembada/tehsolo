<?php

namespace App\Http\Controllers;

use App\Models\Accupation;
use App\Models\AdditionalItem;
use App\Models\Guest;
use App\Models\PriceRateType;
use App\Models\Room;
use App\Models\SourceTravelAgent;
use App\Models\TravelAgent;
use Carbon\Carbon;
use Illuminate\Http\Request;

class RoomViewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "Room View";
        $rooms = Room::with('StatusRoom', 'RoomType', 'TransactionRoom', 'Floor')->get();
        return view('pages.room-view.index', ['title' => $title, 'rooms' => $rooms]);
    }

    public function checkIn(string $id) {
        $title = "Check In";
        $room = Room::with('StatusRoom', 'RoomType')->findOrFail($id);
        $priceRateTypes = PriceRateType::all();
        $occupations = Accupation::all();
        $travelAgents = TravelAgent::all();
        $sourceTravelAgents = SourceTravelAgent::with('TravelAgent')->get();
        $additionalItems = AdditionalItem::where('type', 'Transaction')->get();
        return view('pages.check-in.create', ['title' => $title, "room" => $room, 'priceRateTypes' => $priceRateTypes, 'occupations' => $occupations, 'travelAgents' => $travelAgents, 'sourceTravelAgents' => $sourceTravelAgents, 'additionalItems' => $additionalItems]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $dataRoom = $request->validate([
            'id_room' => "required",
            'id_price_rate_type' => "required",
        ]);

        $dataguest = $request->validate([
            'full_name' => 'required',
            'email' => 'required|email|unique:guests,email',
            'phone' => 'required|unique:guests,phone',
            'identity_card_type' => 'required',
            'identity_card_number' => 'required',
            'exp_identity_card' => 'required',
            'nationality' => 'required',
            'state' => 'required',
            'address' => 'required',
            'city' => 'required',
            'postal' => 'required',
            'country' => 'required',
            'birth_date' => 'required',
            'city_birth' => 'required',
            'state_birth' => 'required',
            'country_birth' => 'required',
            'gender' => 'required',
            'guest_type' => 'required',
            'id_occupation' => 'required',
        ]);

        $stlementOption = $request->validate([
            "type_transaction" => "required",
            "card_number" => "nullable",
            "exp_card" => "nullable",
            "folio_number" => "required",
        ]);

        $stayInformation = $request->validate([
            "arrival" => "required",
            "departure" => "required",
            "total_orang_dewasa" => "nullable",
            "total_anak" => "required",
            "total_bayi" => "required",
            "notes" => "nullable"
        ]);
        //! di stay information status_sewa di masukan annti saat proses otomatis on

        $busineesSourceSetting = $request->validate([
            "id_travel_agent" => "required",
            "id_source_travel_agent" => "nullable",
        ]);

        $detilTransactionItem = $request->validate([
            "id_transaction_room" => "nullable",
            "id_additional_item" => "nullable",
            "qty_item" => "nullable",
            "total_price" => "nullable",
        ]);

        // INI BAGIAN MENGECEK BERAPA HARI YANG TERLEWAT

        // $date1 = "2018-01-10 00:00:00";
        // $date2 = "2019-01-10 00:00:00";

        //   //NUMBER DAYS BETWEEN TWO DATES CALCULATOR
        // $start_date = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $date1);
        // $end_date = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $date2);
        // $different_days = $start_date->diffInDays($end_date);
        // dd($different_days);


        // INI BAGIAN MENAMBAH TANGGALNYA

//         $currentDateTime = Carbon::now();
// $newDateTime = Carbon::now()->addDays(5);

        // $dataguest = $request->validate([
        //     'full_name' => 'required',
        //     'email' => 'required|email|unique:guests,email',
        //     'phone' => 'required|unique:guests,phone',
        //     'identity_card_type' => 'required',
        //     'identity_card_number' => 'required',
        //     'exp_identity_card' => 'required',
        //     'nationality' => 'required',
        //     'state' => 'required',
        //     'address' => 'required',
        //     'city' => 'required',
        //     'postal' => 'required',
        //     'country' => 'required',
        //     'birth_date' => 'required',
        //     'city_birth' => 'required',
        //     'state_birth' => 'required',
        //     'country_birth' => 'required',
        //     'gender' => 'required',
        //     'guest_type' => 'required',
        //     'id_occupation' => 'required',
        // ]);

        // if ($request->file('image') != null) {
        //     $dataguest['image'] = $request->file('image')->store('images/guest', 'public');
        // }

        // $dataguest = Guest::create($dataguest);
        // $dataGuestId = $dataguest->id;

        // $dataTransaction
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
