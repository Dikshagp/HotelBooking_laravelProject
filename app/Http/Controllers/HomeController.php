<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Support\Facades\App;

use App\Models\Room;
use App\Models\Booking;
use App\Models\Gallary;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function room_details($id)
    {
        $room = Room::find($id);
        return view('home.room_details', compact('room'));

    }

    public function add_booking(Request $request  ,$id)
    {
        $request->validate([

            'email'=> 'required|email',
            'startdate'=> 'required|date',
            'enddate'=> 'date|after:startdate',
        ]);
        $booking = new Booking;

        $booking->room_id = $id;
        $booking->name = $request->name;
        $booking->email = $request->email;
        $booking->phone = $request->phone;

        $startdate = $request->startdate;
        $enddate = $request->enddate;

        $isBooked= Booking::where('room_id', $id)
        ->where('start_date', '<=', $enddate)
        ->where('end_date', '>=', $enddate)->exists();

        if($isBooked)
        {
            return redirect()->back()->with('message', 'Room Is Already Booked try different date');
        }
        else
        {
            $booking->start_date = $request->startdate;
        $booking->end_date = $request->enddate;
        $booking->save();

        return redirect()->back()->with('message', 'Room Booked Successfully');

        }
 }

 public function contact_details(Request $request)
 {

    $request->validate([

        'email'=> 'required|email',
        'message'=> 'required',
        'phone'=>'required|numeric'
        
    ]);
    $data = new Contact;

    $data->name =$request->name;
    $data->email =$request->email;
    $data->phone_no =$request->phone;
    $data->message =$request->message;

    $data->save();
    return redirect()->back()->with('message', 'Message Sent Successfully');

 }


 public function our_room()
 {
    $room= Room::all();
    return view('home.our_room', compact('room'));
 }

 public function hotel_gallary ()
 {
    $gallary= Gallary::all();
    return view('home.hotel_gallary', compact('gallary'));
 }


 public function hotel_contact ()
 {
   
    return view('home.hotel_contact');
 }

}
