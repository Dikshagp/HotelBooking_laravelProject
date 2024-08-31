<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Notification;
use App\Models\Room;
use App\Models\Booking;
use App\Models\User;
use Illuminate\Console\View\Components\Alert;
use Illuminate\Support\Facades\Auth;
use App\Models\Gallary;
use App\Models\Contact;
use App\Notifications\SendEmailNotification;
//use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification as FacadesNotification;

class AdminController extends Controller
{
    //
    public function index()
    {
        if(Auth::id())
        {
            $usertype = Auth()->user()->usertype;

            if($usertype =='user')
            {
                $room = Room::all();
                $gallary = Gallary::all();
                return view('home.index', compact('room','gallary'));
            }
            else if($usertype =='admin')
            {
                $roomcount = Room::count();
                $messagecount = Contact::count();
                $bookingcount = Booking::count();
                return view('admin.admin_dashboard', compact('roomcount','messagecount','bookingcount'));
            }
            else{
                return redirect()->back();
            }
        }
    }


    public function home()
    {
        $room = Room::all();
        $gallary = Gallary::all();
        return view('home.index', compact('room', 'gallary'));
    }


    public function create_room()
    {
        return view('admin.create_room');
    }

    public function add_room(Request $request)
    {
        $data = new Room();
        $data->room_title = $request->title;
        $data->description = $request->description;
        $data->price = $request->price;
        $data->room_type = $request->type;
        $data->wifi = $request->wifi;

        $image = $request->image;
        if($image)
        {
            $imageName = time().'.'.$image->getClientOriginalExtension();

            $request->image->move('room', $imageName);

            $data->image=$imageName;
        }

        $data->save();

        return redirect()->back();


    }

    public function view_rooms()
    {
       $data= Room::all();
       
        return view('admin.view_rooms', compact('data'));
    }

    public function delete_room($id)

    {
        $data = Room::find($id);
        
        $data->delete();
        return redirect()->back();
    }

    public function update_room($id)
    {
        $data = Room::find($id);
        return view('admin.update_room', compact('data'));

    }

    public function edit_room(Request $request, $id)
    {
        $data = Room::find($id);

       $data->room_title = $request->title;
        $data->description = $request->description;
        $data->price = $request->price;
        $data->room_type = $request->type;
        $data->wifi = $request->wifi;

        $image =$request->image;
        if($image)
        {
            $imageName = time().'.'.$image->getClientOriginalExtension();

            $request->image->move('room', $imageName);

            $data->image=$imageName;
        }


        $data->save();

        return redirect()->back();
        

    }


    public function bookings()
    {
        $bookingdata = Booking::all();
        return view('admin.bookings', compact('bookingdata'));
    }


    public function delete_bookings($id)
    {
        $book = Booking::find($id);
        $book->delete();
        return redirect()->back();
    }

    public function approve_bookings($id)
    {
        $book = Booking::find($id);
        
        $book->status = "Approved";
        $book->save();
        return redirect()->back();

        

    }

    public function reject_bookings($id)
    {
        $book = Booking::find($id);
        
        $book->status = "Rejected";
        $book->save();
        return redirect()->back();

        

    }

    public function view_gallary()
    {
        $gallary = Gallary::all();
        return view('admin.gallary', compact('gallary'));
    }

    public function upload_gallary(Request $request)
    {
        $data = new Gallary;
        $image = $request->image;

        if($image)
        {
            $imageName = time().'.'.$image->getClientOriginalExtension();

            $request->image->move('gallary', $imageName);
            $data->image = $imageName;
            $data->save();
            return redirect()->back();

        }
    }


    public function delete_image($id)
    {
        $data = Gallary::find($id);
        $data->delete();
        return redirect()->back();
    
    }

    public function contact_messages()
    {

        $contact = Contact::all();
        
        return view('admin.contact_messages', compact('contact'));
    }

    public function send_email($id)
    {
        $data =Contact::find($id);
        return view('admin.sendmail', compact('data'));
    }

    public function mail(Request $request, $id)
    {
        $data= Contact::find($id);
        
        $details =[

            'greeting' => $request->greeting,
            'body' => $request->body,
            'action_text' => $request->action_text,
            'action_url' => $request->action_url,
            'end_line' => $request->end_line,
        ];



    

    Notification::send($data, new SendEmailNotification($details));

        return redirect()->back();
    }



    public function admin_dashboard()
    {
        $roomcount = Room::count();
       $messagecount = Contact::count();
       $bookingcount = Booking::count();

      //  return view('admin.admin_dashboard')->with($roomcount);

      return view('admin.admin_dashboard', compact('roomcount','messagecount','bookingcount'));
    }
}
