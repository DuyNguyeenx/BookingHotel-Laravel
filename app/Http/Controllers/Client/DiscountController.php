<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Discount;
use App\Models\Room;
use Illuminate\Http\Request;

class DiscountController extends Controller
{
    //
    public function index(){
        $discounts = Discount::all();
        return view('client.discounts', compact('discounts'));
    }

    public function detail($id) {
        $promotion = Discount::find($id);
        $room = Room::all();
        return view('client.promotion', compact('promotion','room'));
    }
}
