<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Room;
use Illuminate\Http\Request;

class DetailController extends Controller
{
    //
    public function detail($id){
        $room = Room::find($id);
        $type_room = \App\Models\Type::all();
        return view('client.detail',compact('room','type_room'));
    }
}
