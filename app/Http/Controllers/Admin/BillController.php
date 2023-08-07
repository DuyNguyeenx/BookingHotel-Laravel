<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;
use NumberFormatter;

class BillController extends Controller
{
    //
    public function index() {
        $bill = Booking::all();
        return view('admin.bill.index',compact('bill'));
    }
    public function detail($id){
        $bill = Booking::find($id);
        $price = $bill->total_price;
        $formatter = new NumberFormatter('vi_VN', NumberFormatter::CURRENCY);
        $formattedAmount = $formatter->formatCurrency($price, 'VND');
        return view('admin.bill.detail',compact('bill','formattedAmount'));
    }
}
