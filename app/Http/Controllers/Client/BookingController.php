<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\Client\BookingRequest;
use App\Mail\BookingConfirmationMail;
use App\Models\Booking;
use App\Models\Room;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;

class BookingController extends Controller
{
    //

    public function store(BookingRequest $request){
        $room = Room::all();
        if($request->isMethod('POST')) {
            $booking = Booking::create($request->except('_token'));
            $totalPrice = $booking->calculateTotalPrice();
            $booking->total_price = $totalPrice;
            $booking->save();
            if ($booking->id) {
                Session::flash('success','Room booked successfully');
                Mail::to($booking->email)->send(new BookingConfirmationMail($booking));
                return redirect()->route('client.home');
            }
          }
          return view('client.booking',compact('room'));
    }

    public function testMail(){
        // $name = 'hello';
        // Mail::send('client.email',compact('name'),function($email){
        //     $email->to('duynhph24103@fpt.edu.vn','duy nguyễn');
        // });
        $booking = Booking::find(5);
        $mail = new BookingConfirmationMail($booking);
        Mail::to('nguyenhuuduy01102003@gmail.com')->send($mail);
        return true;
    }
}
