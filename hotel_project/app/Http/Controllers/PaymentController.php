<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Room;
use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Charge;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;

class PaymentController extends Controller
{
    public function showPaymentForm()
    {
        $pendingBooking = session('pending_booking');
        if (!$pendingBooking) {
            return back()->with('error', 'No pending booking found.');
        }
        
        return view('payment.form', ['booking' => $pendingBooking]);
    }

    public function processPayment(Request $request)
    {
        Stripe::setApiKey(config('services.stripe.secret'));

        try {   
            

            // Payment successful, now save the booking
            $bookingData = session('pending_booking');
            if ($bookingData) {
                
               

                    $startDate = Carbon::parse($bookingData['start_date']);
                    $endDate = Carbon::parse($bookingData['end_date']);
                    $numberOfDays = $endDate->diffInDays($startDate);
                    
                    // Fetch the price per day from the room
                    $room = Room::findOrFail($bookingData['room_id']);
                    $pricePerDay = $room->price; // Assume this field exists in your rooms table
            
                    $totalPrice = $numberOfDays * $pricePerDay;
                    Charge::create([
                        "amount" => $totalPrice * 100, // Amount in cents
                        "currency" => "usd",
                        "source" => $request->stripeToken,
                        "description" => "Hotel Room Booking Payment"
                    ]);
                $booking = new Booking($bookingData);
                $booking->save();
                
                // Clear the pending booking from the session
                session()->forget('pending_booking');

                return redirect()->to('room_details/' . $bookingData['room_id'])->with('message', 'Payment successful and room booked!');
            } 
        } catch (\Stripe\Exception\CardException $e) {
            // Catch Stripe-specific exceptions
            return back()->with('error', 'Payment failed: ' . $e->getError()->message);
        } catch (\Exception $e) {
            // Catch any other exceptions
            return back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }
}
