<?php

namespace App\Http\Controllers;

use App\Models\AdditionalItem;
use App\Models\DetilRoomAmanities;
use App\Models\Floor;
use App\Models\Room;
use App\Models\RoomType;
use App\Models\StatusRoom;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "Room";
        $rooms = Room::with('RoomType', 'StatusRoom', 'DetilRoomAmanities')->get();
        return view('pages.room.index', ["title" => $title, "rooms" => $rooms]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "Create Room";
        $roomTypes = RoomType::all();
        $statusRooms = StatusRoom::all();
        $floors = Floor::all();
        $additionalItems = AdditionalItem::where('type', 'Room')->get();
        return view('pages.room.create', ["title" => $title, "roomTypes" => $roomTypes, "statusRooms" => $statusRooms, "floors" => $floors, "additionalItems" => $additionalItems]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'id_status_room' => 'required',
            'id_room_type' => 'required',
            'id_floor' => 'required',
            'kode_room' => 'required',
            'status_sewa' => 'required',
        ]);
        $room = Room::create($data);
        if ($request->id_additional_item) {
            for ($i=0; $i < count($request->id_additional_item); $i++) {
                $data = [
                    "id_room" => $room->id,
                    "id_additional_item" => $request->id_additional_item[$i],
                    "qty_item" => $request->qty_item[$i],
                ];
                try {
                    DetilRoomAmanities::create($data);
                } catch (\Throwable $e) {
                    dd($e);
                }
            }
        }
        return redirect(route('room.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Room $room)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Room $room)
    {
        $title = "Edit Room";
        $roomTypes = RoomType::all();
        $statusRooms = StatusRoom::all();
        $floors = Floor::all();
        $additionalItems = AdditionalItem::where('type', 'Room')->get();
        return view('pages.room.edit', ["title" => $title, "room" => $room, "roomTypes" => $roomTypes, "statusRooms" => $statusRooms, "floors" => $floors, "additionalItems" => $additionalItems]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Room $room)
    {
        $room = Room::findOrFail($room->id);
        $data = $request->validate([
            'name' => 'required',
            'id_status_room' => 'required',
            'id_room_type' => 'required',
            'id_floor' => 'required',
            'kode_room' => 'required',
            'status_sewa' => 'required',
        ]);
        $room->update($data);

        //* Hapus Data detil_room_amanities yang berelasi dengan Room Terpilih
        if ($request->id_detil_room_amanities[0] != null) {
            foreach ($request->id_detil_room_amanities as $value) {
                DetilRoomAmanities::destroy($value);
            }
        }

        //* Tambah Data detil_room_amanities
        if ($request->id_additional_item) {
            for ($i=0; $i < count($request->id_additional_item); $i++) {
                $data = [
                    "id_room" => $room->id,
                    "id_additional_item" => $request->id_additional_item[$i],
                    "qty_item" => $request->qty_item[$i],
                ];
                try {
                    DetilRoomAmanities::create($data);
                } catch (\Throwable $e) {
                    dd($e);
                }
            }
        }
        return redirect(route('room.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Room $room)
    {
        $room = Room::findOrFail($room->id);
        Room::destroy($room->id);
        return redirect(route('room.index'));
    }
}
