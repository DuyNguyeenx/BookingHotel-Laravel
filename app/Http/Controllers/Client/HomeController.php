<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Image;
use App\Models\Room;
use App\Models\Type;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function home() {
        $list_cate = Type::all();
        $banner = Image::all();
        return view('client.home',compact('list_cate','banner'));
    }
    public function type($id)
    {
        $type = Type::find($id);
        $room = Room::where('type_id', $id)->get();
        return view('client.room_type', compact('room','type'));
    }

}
