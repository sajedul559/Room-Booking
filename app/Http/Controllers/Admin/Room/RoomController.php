<?php

namespace App\Http\Controllers\Admin\Room;

use App\Models\Room;
use App\Models\RoomImage;
use Illuminate\Http\Request;
use App\Services\Room\RoomService;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\RoomFromRequest;
use App\Services\Property\PropertyService;

class RoomController extends Controller
{
    protected $roomService;
    protected $propertyService;

    public function __construct(RoomService $roomService, PropertyService $propertyService)
    {
        $this->roomService = $roomService;
        $this->propertyService = $propertyService;
    }

    public function index()
    {
        $rooms = Room::with('images')->get();
        $properties = $this->propertyService->getAllProperties();
        
        return view('backend.rooms.list', compact('rooms', 'properties'));
    }

    public function create()
    {
        $properties = $this->propertyService->getAllProperties();
        return view('backend.rooms.create',compact('properties'));
    }

    public function store(RoomFromRequest $request)
    {
        $this->roomService->create($request->validated(), Auth::id());
        return redirect()->route('rooms.index')->with('success', 'Room created successfully.');
    }

    public function show(Room $room)
    {
        return view('backend.rooms.show', compact('room'));
    }

    public function edit(Room $room)
    {
        $room->furnishFeatures = explode(',', $room->furnishFeatures);
        $room->accepting_options = explode(',', $room->accepting_options);

        $gellary_image = RoomImage::where('room_id', $room->id)->get();
     
        $properties = $this->propertyService->getAllProperties();

        return view('backend.rooms.edit', compact('room','gellary_image','properties'));
    }

    public function update(RoomFromRequest $request, Room $room)
    {
        $this->roomService->update($room, $request->validated(), Auth::id());
        return redirect()->back()->with('success', 'Room updated successfully.');
    }

    public function destroy(Room $room)
    {
        $this->roomService->delete($room);
        return redirect()->route('rooms.index')->with('success', 'Room deleted successfully.');
    }
    public function getRoomsByProperty(Request $request)
    {
        $rooms = Room::where('property_id', $request->property_id)->get();
        return response()->json($rooms);
    }
}