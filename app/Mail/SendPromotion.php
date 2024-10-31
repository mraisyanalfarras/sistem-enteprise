<?php

namespace App\Mail;

use App\Models\Customer;
use App\Models\Promotion;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendPromotionMail extends Mailable
{
    use Queueable, SerializesModels;

    public $customer;
    public $promotion;

    /**
     * Buat instance baru untuk mailable.
     */
    public function __construct(Customer $customer, Promotion $promotion)
    {
        $this->customer = $customer;
        $this->promotion = $promotion;
    }

    /**
     * Bangun pesan email.
     */
    public function build()
    {
        return $this->subject('Exclusive Promotion Just for You!')
                    ->view('emails.send-promotion');
    }
}
