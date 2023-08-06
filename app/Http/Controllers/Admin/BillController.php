<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;

class BillController extends Controller
{
    //
    public function index() {
        $bill = Booking::all();
        return view('admin.bill.index',compact('bill'));
    }
    public function detail($id){
        $bill = Booking::find($id);
        return view('admin.bill.detail',compact('bill'));
    }
}
