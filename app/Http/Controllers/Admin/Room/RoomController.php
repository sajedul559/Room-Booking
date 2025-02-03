<?php

namespace App\Http\Controllers\Admin\Room;

use App\Models\Room;
use App\Services\Room\RoomService;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\RoomFromRequest;

class RoomController extends Controller
{
    protected $roomService;

    public function __construct(RoomService $roomService)
    {
        $this->roomService = $roomService;
    }

    public function index()
    {
        $rooms = Room::with('images')->get();
        return view('backend.rooms.list', compact('rooms'));
    }

    public function create()
    {
        return view('backend.rooms.create');
    }

    public function store(RoomFromRequest $request)
    {
        $this->roomService->create($request->validated(), Auth::id());
        return redirect()->route('rooms.index')->with('success', 'Room created successfully.');
    }

    public function show(Room $room)
    {
        return view('rooms.show', compact('room'));
    }

    public function edit(Room $room)
    {
        return view('backend.rooms.edit', compact('room'));
    }

    public function update(RoomFromRequest $request, Room $room)
    {
        $this->roomService->update($room, $request->validated(), Auth::id());
        return redirect()->route('rooms.index')->with('success', 'Room updated successfully.');
    }

    public function destroy(Room $room)
    {
        $this->roomService->delete($room);
        return redirect()->route('rooms.index')->with('success', 'Room deleted successfully.');
    }
}