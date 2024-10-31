<?php

namespace App\Http\Controllers;

use App\Mail\SendPromotionMail;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Promotion;
use Illuminate\Support\Facades\Mail;

class SendPromotionController extends Controller
{
    /**
     * Menampilkan form untuk memilih customer dan promotion.
     */
    public function showForm()
    {
        $customers = Customer::all();
        $promotions = Promotion::all();

        return view('admin.send-promotion', compact('customers', 'promotions'));
    }

    /**
     * Mengirim email promosi ke customer yang dipilih.
     */
    public function sendPromotion(Request $request)
    {
        $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'promotion_id' => 'required|exists:promotions,id',
        ]);

        // Mendapatkan customer dan promotion yang dipilih
        $customer = Customer::findOrFail($request->customer_id);
        $promotion = Promotion::findOrFail($request->promotion_id);

        // Mengirimkan email ke customer yang dipilih
        Mail::to($customer->email)->send(new SendPromotionMail($customer, $promotion));

        return redirect()->back()->with('success', 'Promotion sent successfully!');
    }
}
