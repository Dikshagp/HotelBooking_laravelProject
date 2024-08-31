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
    padding: 18px;
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
        <div class="div_center">

            <h1 style="font-size: 25px;, font-weight:bold; text-align:center;">Rooms</h1>

            <div class="tabledata">

            <table class="table_design">
                <tr>
                    <th class="th_design">Room_Title</th>
                    <th class="th_design">Description</th>
                    <th class="th_design">Price</th>
                    <th class="th_design">Room_Type</th>
                    <th class="th_design">Wifi</th>
                    <th class="th_design">Images</th>
                    <th class="th_design">Action</th>
                    
                </tr>

                @foreach ($data as $item)
                    
               
                <tr>
                    <td>{{$item->room_title}}</td>
                    <td>{!! Str::limit($item->description, 100) !!}</td>
                    <td>{{$item->price}}RS</td>
                    <td>{{$item->room_type}}</td>
                    <td>{{$item->wifi}}</td>
                    <td><img src="room/{{$item->image}}"></td>
                    <td>
                        <a onclick= "return confirm('Are You sure to delete this');"href="{{url('delete_room', $item->id)}}">
                        <button style="margin-bottom: 15px" class="btn btn-danger"type="submit">Delete</button></a>
                    
                        <a href="{{url('update_room', $item->id)}}">
                            <button class="btn btn-success"type="submit">Update</button></a>
                    
                    
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