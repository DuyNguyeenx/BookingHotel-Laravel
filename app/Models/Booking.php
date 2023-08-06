<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    protected $table = 'bookings';
    protected $fillable = ['name','email','phone','gender','nation','request_add','room_id','card_number','card_name',
    'card_date','card_code','start_date','end_date','total_price'];
    public function room()
    {
        return $this->belongsTo(Room::class);
    }
    public function calculateTotalPrice()
    {
        $checkIn = Carbon::parse($this->start_date);
        $checkOut = Carbon::parse($this->end_date);
        $numberOfNights = $checkOut->diffInDays($checkIn);

        $roomPrice = $this->room->price;

        $totalPrice = $roomPrice * $numberOfNights;

        return $totalPrice;
    }
}
