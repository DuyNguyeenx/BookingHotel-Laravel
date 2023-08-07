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
use NumberFormatter;

class BookingController extends Controller
{
    //
    public function show($id){
        $room = Room::find($id);
        $price = $room->price;
        $formatter = new NumberFormatter('vi_VN', NumberFormatter::CURRENCY);
        $formattedAmount = $formatter->formatCurrency($price, 'VND');
        return view('client.booking',compact('room','formattedAmount'));
    }
    public function store(BookingRequest $request){
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
    }

    public function testMail(){
        // $name = 'hello';
        // Mail::send('client.email',compact('name'),function($email){
        //     $email->to('duynhph24103@fpt.edu.vn','duy nguyễn');
        // });
        $booking = Booking::find(10);
        $mail = new BookingConfirmationMail($booking);
        Mail::to($booking->email, 'duy nguyễn')->send($mail);
        return true;
    }
}
