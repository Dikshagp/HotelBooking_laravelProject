<!DOCTYPE html>
<html lang="en">
   <head>
    <base href="/public">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
      @include('home.css')

<style>
  
   label{
    display:inline-block;
    width: 200px
   }
   input{
    width: 100%;
    padding: 10px;
   }
</style>






   </head>
   <!-- body -->
   <body class="main-layout">
      <!-- loader  -->
      <div class="loader_bg">
         <div class="loader"><img src="images/loading.gif" alt="#"/></div>
      </div>
     
      <!-- header -->
      <header>
        @include('home.header')
      </header>


      <div  class="our_room">
        <div class="container">
           <div class="row">
              <div class="col-md-12">
                 <div class="titlepage">
                    <h2>Our Room</h2>
                    <p>Lorem Ipsum available, but the majority have suffered </p>
                 </div>
              </div>
           </div>
    
          
               
           
           <div class="row">
            
              <div class="col-md-8">
                 <div id="serv_hover"  class="room">
                    <div style="padding-top: 5px" class="room_img">
                       <figure><img style="height: 300px; width:750px; margin:auto" src="/room/{{$room->image}}" alt="#"/></figure>
                    </div>
                    <div class="bed_room">
                       <h3>{{$room->room_title}}</h3>
                       <p style="padding: 10px">{!! Str::limit($room->description, 200) !!}</p>
                        <h2 style="font-weight:bold; font-size:20px">Room Type: {{$room->room_type}}</h2>
                        <h2 style="font-weight:20px; font-size:18px">Room Wifi:{{$room->wifi}}</h2>
                        <h2 style="font-weight:bold; font-size:25px">Room Price:{{$room->price}}</h2>
                    </div>
                    
                 </div>
              </div>

              <div class="col-md-4">
                <h1 style="font-size:30px">Book Room</h1>
                <div>

                    @if(session()->has('message'))
                    <div class ="alert alert-success">
                        <button type="button" class="close" data-bs-dismiss="alert">X</button>

                    {{session()->get('message')}}</div>

                    @endif
                </div>

              

                    
                





                @if($errors)
                @foreach ($errors->all() as $errors)
                <li style="color: red"> {{$errors}}</li>
               
                @endforeach
                @endif

              
               

                
                    
              

                <form action="{{url('add_booking', $room->id)}}"method="Post">
                    @csrf
                <div class="book_design">
                    <label>Name</label>
                    <input type="text" name="name" placeholder="Please Enter Name" 
                    @if(Auth::id())value="{{Auth::user()->name}}" @endif>
                    
              </div>
              <div class="book_design">
                <label>Email</label>
                <input type="email" name="email" placeholder="Please Enter Email Address"  
                @if(Auth::id())value="{{Auth::user()->email}}" @endif>
                
                
                
                </div>
                <div class="book_design">
                    <label>Phone No</label>
                    <input type="number" name="phone" placeholder="Please Enter Phone"
                    @if(Auth::id())value="{{Auth::user()->phone}}" @endif>
                    
                    </div>

                    <div class="book_design">
                        <label>Start Date</label>
                        <input type="date" name="startdate" id="sdate">
                        
                        </div>
                        <div class="book_design">
                            <label>End Date</label>
                            <input type="date" name="enddate" id="edate">
                           
                            </div>

                            <button style="margin-top: 10px" type="submit" class="btn btn-success">Book Room</button>
                           
            </div>
           
               
        </form>
       
              
                 </div>
                
              </div>
           </div>
      
     


     
    
     
     <!--  footer -->
    
      @include('home.footer')
     
     <script type="text/javascript">
        $(function()
        {
             var dtoday = new Date();
             var month = dtoday.getMonth()+1;
             var day = dtoday.getDate();
             var year = dtoday.getFullyear();

             if(month<10)
             month ='0'+ month.toString();

             if(day<10)
             day ='0'+ day.toString();

             var maxDate = year + '-' + month + '-' +day;
             $('#sdate').attr('min', maxDate);
             $('#edate').attr('min', maxDate);
        });
     </script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
   </body>
</html>