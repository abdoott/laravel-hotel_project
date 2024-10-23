<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Contact;
use App\Models\Gallary;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Notifications\SendEmailNotification;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;


class AdminController extends Controller
{
    public function index(){
        if(Auth::id()){

            $usertype = Auth()->user()->usertype;
            
            if($usertype == 'user'){
                $room = Room::all();
                $rooms = Room::take(6)->get();
                $gallary = Gallary::all();
                return view('home.index',compact('room'),compact('gallary','rooms'));
            }

            else if($usertype == 'admin'){
                
                $today = Carbon::today();
                $roomCount = Room::count();
                
                $reservedRoomCount = Booking::where('status', 'approved')
                                            ->whereDate('start_date', '<=', $today)
                                            ->whereDate('end_date', '>=', $today)
                                            ->count();
                $availableRoomCount = $roomCount - $reservedRoomCount;

                $totalRevenueToday = Booking::where('status', 'approved')
                                            ->whereDate('start_date', '<=', $today)
                                            ->whereDate('end_date', '>=', $today)
                                            ->join('rooms', 'bookings.room_id', '=', 'rooms.id')  // Joining rooms table
                                            ->sum('rooms.price');  // Summing up the prices
                $reserved = ($reservedRoomCount/$roomCount)*100;
                $available = 100-$reserved;
                $revenue = (100*$totalRevenueToday)/820;
                
                return view('admin.index', compact('roomCount', 'reservedRoomCount', 'availableRoomCount', 'totalRevenueToday','reserved','available','revenue'));
            }

            else{
                return redirect()->back();
            }
        }
        
    }

    public function home(){
        $room = Room::all();
        $rooms = Room::take(6)->get();
        $gallary = Gallary::all();
        return view('home.index',compact('room'),compact('gallary','rooms'));
    }
    public function create_room(){
        $data  = Contact::latest()->take(5)->get();
        return view('admin.create_room',compact('data'));
    }
    public function add_room(Request $request){
        $data = new Room();
        
        $data->room_title = $request->title;
        $data->description = $request->Description;
        $data->price = $request->price;
        $data->wifi = $request->wifi;
        $data->room_type = $request->type;

        $image = $request->image;

        if($image){
            $imagename=time() . '.' . $image->getClientOriginalExtension();
            $request->image->move('room',$imagename);
            $data->image = $imagename;
        }

        $data->save();

        return redirect()->back();
    }

    public function view_room(){
        $view = Room::all();
        $data  = Contact::latest()->take(5)->get();

        return view('admin.view_room',compact('view','data'));
    }

    public function room_delete($id){
        $data = Room::find($id);
        $data->delete();
        return redirect()->back();
    }

    public function room_update($id){
        $update_room = Room::find($id);
        $data  = Contact::latest()->take(5)->get();
        return view('admin.update_room',compact('data','update_room'));
    }

    public function edit_room(Request $request,$id){
        $data = Room::find($id);

        $data->room_title = $request->title;
        $data->description = $request->Description;
        $data->price = $request->price;
        $data->wifi = $request->wifi;
        $data->room_type = $request->type;


        $image = $request->image;
        if($image){
            $imagename=time() . '.' . $image->getClientOriginalExtension();
            $request->image->move('room',$imagename);
            $data->image = $imagename;
        }

        $data->save();

        return redirect()->back();
    }

    public function boookings(){
        $data = Booking::all();
        return view('admin.booking',compact('data'));
    }

    public function booking_delete($id){
        $data = Booking::find($id);
        $data->delete();
        return redirect()->back();
    }

    public function approve_booking($id){
        $data = Booking::find($id);
        $data->status = 'approved';
        $data->save();
        return redirect()->back();
    }

    public function reject_booking($id){
        $data = Booking::find($id);
        $data->status = 'rejected';
        $data->save();
        return redirect()->back();
    }

    public function gallary_view(){
        $data = Gallary::all();
        return view('admin.gallary_view',compact('data'));
    }

    public function upload_gallary(Request $request){
        $data = new Gallary();
        $image = $request->image;
        if($image){
            $imagename = time().'.'.$image->getClientOriginalExtension();
            $request->image->move('gallary',$imagename);
            $data->image = $imagename;
            $data->save();
           
        }
        
        return redirect()->back();
    }
    
    public function delete_gallary($id){
        $data = Gallary::find($id);
        $data->delete();
        return redirect()->back();
    }

    public function messages(){
        $data = Contact::all();
        return view('admin.messages',compact('data'));
    }

    public function send_mail($id){
        $send = Contact::find($id);
        $data  = Contact::latest()->take(5)->get();
        return view('admin.send_mail',compact('send'),compact('data'));
    }

    public function mail(Request $request,$id){

        $data = Contact::find($id);
        $details = [
            'greeting' => $request->greeting,

            'body' => $request->mail,

            'action_text' => $request->action_text,

            'action_url' => $request->action_url,

            'endline' => $request->end_line, 

        ];
        Notification::send($data,new SendEmailNotification($details));

        return redirect()->back();

    }



    public function countUnreadMessages()
    {
        // Replace this logic with your actual unread messages count logic
        $unreadCount = Contact::where('is_read', false)->count();

        return response()->json(['unreadCount' => $unreadCount]);
    }

    public function markAsRead($id){
        // Find the message by ID and mark it as read
        $data = Contact::find($id);
        if ($data) {
            $data->is_read = true;
            $data->save();
            return response()->json(['status' => 'success']);
        }

        return response()->json(['status' => 'error', 'message' => 'Message not found'], 404);
    }
}
