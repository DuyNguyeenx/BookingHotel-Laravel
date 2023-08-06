<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Room;
use Illuminate\Http\Request;
use NumberFormatter;

class DetailController extends Controller
{
    //
    public function detail($id){
        $room = Room::find($id);
        $price = $room->price;
        $type_room = \App\Models\Type::all();
        $formatter = new NumberFormatter('vi_VN', NumberFormatter::CURRENCY);
        $formattedAmount = $formatter->formatCurrency($price, 'VND');
        return view('client.detail',compact('room','type_room','formattedAmount'));
    }
}
