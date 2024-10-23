<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Contact;
use App\Models\Gallary;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function room_details($id) {
        $room = Room::find($id);
    
        // Fetch booked dates for the specific room
        $bookings = DB::table('bookings')
                      ->where('room_id', $id) // Assuming you have a room_id column in your bookings table
                      ->select('start_date', 'end_date')
                      ->get();
    
        $bookedDates = [];
        foreach ($bookings as $booking) {
            $period = new \DatePeriod(
                new \DateTime($booking->start_date),
                new \DateInterval('P1D'),
                (new \DateTime($booking->end_date))->modify('+1 day')
            );
    
            foreach ($period as $date) {
                $bookedDates[] = $date->format('Y-m-d');
            }
        }
    
        return view('home.room_details', compact('room', 'bookedDates'));
    }
    

    public function add_booking(Request $request, $id)
{
    $request->validate([
        'startDate' => 'required|date',
        'endDate' => 'date|after:startDate',
        'name' => 'required',
        'email' => 'required|email',
        'phone' => 'required',
    ]);

    $start_date = $request->startDate;
    $end_date = $request->endDate;

    $isBooked = Booking::where('room_id', $id)
        ->where('start_date', '<=', $end_date)
        ->where('end_date', '>=', $start_date)
        ->exists();

    if ($isBooked) {
        return redirect()->back()->with('error', 'Room is already booked for the selected dates. Please try different dates.');
    }

    // Create a booking array but don't save it yet
    $bookingData = [
        'room_id' => $id,
        'name' => $request->name,
        'email' => $request->email,
        'phone' => $request->phone,
        'start_date' => $start_date,
        'end_date' => $end_date,
    ];

    // Store booking data in session
    session(['pending_booking' => $bookingData]);

    // Redirect to payment form
    return redirect()->route('payment.form');
}


    public function contact_us(Request $request){
        $data =new Contact();

        $data->name = $request->Name;
        $data->email = $request->Email;
        $data->phone = $request->Phone_Number;
        $data->message = $request->Message;

        $data->save();
        return redirect()->back()->with('message','Message Sent Successfully');
    }

    public function our_rooms(){
        $room =Room::all();
        return view('home.our_rooms',compact('room'));
    }

    public function gallery_(){
        $gallary = Gallary::all();
        return view('home.gallery_',compact('gallary'));
    }

    public function contact(){
        return view('home.contact_us');
    }

    public function about_us(){
        return view('home.about_us');
    }
}
