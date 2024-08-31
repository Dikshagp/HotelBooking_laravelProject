<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')
  </head>
  <body>
   @include('admin.header')
   @include('admin.sidebar')


   <div class="page-content">
    <div class="page-header">
      <div class="container-fluid">
        <center>
        <div>
            <h1 style="font-size: 30px; font-weight:bolder;">Gallary</h1>
        </div>
        <div class="row">

        @foreach ($gallary as $item)
        <div class="col-md-4">
        <img style="height: 200px;, width:400px" src="/gallary/{{$item->image}}" >

       <a href="{{url('delete_image',$item->id)}}"> <button style="margin: 7px" class="btn btn-danger">Delete</button></a>
    </div>
        @endforeach
    
</div>

        <form action="{{url('upload_gallary')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div style="padding: 30px; color:white; font-weight:bolder;, margin:4px;">
                <label>Upload Image</label>
                <input type="file" name="image" required >
            
                <label>Add Image</label>
                <input class="btn btn-success"type="submit" value="Add Image" >
            </div>
        </form>
    </center>


      </div>
    </div>
</div>
     
      
       @include('admin.footer')
  </body>
</html>