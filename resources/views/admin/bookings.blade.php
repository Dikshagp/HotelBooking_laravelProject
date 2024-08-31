<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')
    <style>
        .table_design
        {
            border: 2px solid white;
            width: 80%;
            margin: auto;
            margin-top: 40px;
            text-align: center;
        }
        .th_design
        {
            background-color: skyblue;
            padding: 12px;
        }
        tr{
            border: 3px solid white;
            
        }
        td{
            padding: 10px;
        }
        
          </style>
  </head>
  <body>
   @include('admin.header')
   @include('admin.sidebar')

   <div class="page-content">
    <div class="page-header">
      <div class="container-fluid">



        <h1 style="font-size: 25px;, font-weight:bold; text-align:center;">Bookings</h1>

        <div class="tabledata">

          

        <table class="table_design">
            <tr>
                <th class="th_design">Room_Id</th>
                <th class="th_design">Customer Name</th>
                <th class="th_design">Email</th>
                <th class="th_design">Phone</th>
                <th class="th_design">Arrival Date</th>
                <th class="th_design">Leaving Date</th>
                <th class="th_design">Status</th>
                <th class="th_design">Room Title</th>
                <th class="th_design">Price</th>
                <th class="th_design">Image</th>
                <th class="th_design">Delete</th>
                <th class="th_design">Action</th>
               
            </tr>
            @foreach ($bookingdata as $item)

           
                
           
             <tr>
               <td>{{$item->room_id}}</td>
               <td>{{$item->name}}</td>
               <td>{{$item->Email}}</td>
               <td>{{$item->phone}}</td>
               <td>{{$item->start_date}}</td>
               <td>{{$item->end_date}}</td>
               <td>

                @if($item->status == 'Approved')

                <span style="color: skyblue">Approved</span>
    
                @elseif($item->status == 'Rejected')
                <span style="color: red">Rejected</span>

                @else($item->status == 'waiting')
                <span style="color: rgb(225, 255, 0)">Waiting</span>
    
                @endif



               </td>
               <td>{{$item->room->room_title}}</td>
               <td>{{$item->room->price}}</td>
               <td><img style="width: 200" src="/room/{{$item->room->image}}" >
                </td>
                <td>
                    <a onclick="return confirm('Are You sure to delete');" href="{{url('delete_bookings', $item->id)}}" class="btn btn-danger">Delete</a>
                </td>
                <td>
                  <a style="padding: 4px; margin-bottom:4px;" href="{{url('approve_bookings', $item->id)}}" class="btn btn-success">Approve</a>
                  <a href="{{url('reject_bookings', $item->id)}}" class="btn btn-warning">Reject</a>
                </td>

                
               
            </tr>
          
            @endforeach
        </table>
    </div>

      


  </div>
</div>
</div>
   
      
       @include('admin.footer')
  </body>
</html>