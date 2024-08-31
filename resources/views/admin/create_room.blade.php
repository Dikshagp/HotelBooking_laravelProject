<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')

    <style type="text/css">

    label{
        display: inline-block;
    width: 200px;
    }
    .div_room{
        padding-top: 30px;
        
    }
    .div_center
    {
        text-align: center;
        padding-top: 40px;
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

            <h1 style="font-size: 30px;, font-weight:bold;">Add Rooms</h1>

            <form action="{{url('add_room')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="div_room">
                    <label>Room Title</label>
                    <input type="text" name="title">
                </div>

                <div class="div_room">
                    <label>Room Description</label>
                    <textarea name="description" id="description"></textarea>
                </div>

                <div class="div_room">
                    <label>Price</label>
                    <input type="number" name="price">
                </div>

                <div class="div_room">
                    <label>Room Type</label>
                    <select name="type">
                        <option selected value="regular">Regular</option>
                        <option value="premium">Premium</option>
                        <option value="deluxe">Deluxe</option>

                    </select>
                </div>

                <div class="div_room">
                    <label>Free Wifi</label>
                    <select name="wifi">
                        <option selected value="yes">Yes</option>
                        <option value="no">No</option>
                        

                    </select>
                </div>

                <div class="div_room">
                    <label>Upload Image</label>
                    <input type="file" name="image">
                </div>

                <div class="div_room">
                    
                    <input class="btn btn-primary "type="submit"  value="Add Room">
                </div>

            </form>
        </div>


      </div>
    </div>
</div>
     
       @include('admin.footer')
  </body>
</html>