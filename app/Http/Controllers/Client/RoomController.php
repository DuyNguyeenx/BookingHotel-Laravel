<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Room;
use Illuminate\Http\Request;
use NumberFormatter;
class RoomController extends Controller
{
    //
    public function show() {
        $rooms = Room::all();
        return view('client.rooms', compact('rooms'));
    }


}
