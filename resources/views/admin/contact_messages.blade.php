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
                    <th class="th_design">Name</th>
                    <th class="th_design">Email</th>
                    <th class="th_design">Phone</th>
                    <th class="th_design">Message</th>
                   
                    <th class="th_design">Action</th>
                    
                </tr>

                @foreach ($contact as $item)
                    
               
                <tr>
                    <td>{{$item->name}}</td>
                   
                    <td>{{$item->email}}</td>
                    <td>{{$item->phone_no}}</td>
                    <td>{!! Str::limit($item->message, 100) !!}</td>
                    
                    <td>
                 
                    <a href="{{url('send_email', $item->id)}}">
                            <button class="btn btn-success"type="submit">Send Email</button></a>
                    
                    
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