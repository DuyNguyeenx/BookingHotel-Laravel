<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Room;
use Illuminate\Http\Request;
use NumberFormatter;
use Illuminate\Pagination\Paginator;
class RoomController extends Controller
{
    //
    public function show() {
        $rooms = Room::paginate(2);
        return view('client.rooms', compact('rooms'));
    }


}
