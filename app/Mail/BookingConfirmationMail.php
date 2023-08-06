<?php

namespace App\Mail;

use App\Models\Booking;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class BookingConfirmationMail extends Mailable
{
    use Queueable, SerializesModels;
    public $booking;
    /**
     * Create a new message instance.
     */
    public function __construct(Booking $booking)
    {
        //
        $this->booking = $booking;
    }
    /**
     * Get the message envelope.
     */
    public function build()
    {
        return $this->subject('Thông báo đặt phòng thành công')->view('client.email')->with(['booking'=>$this->booking]);
    }
}
