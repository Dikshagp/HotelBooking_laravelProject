<div class="d-flex align-items-stretch">
    <!-- Sidebar Navigation-->
    <nav id="sidebar">
      <!-- Sidebar Header-->
      <div class="sidebar-header d-flex align-items-center">
        <div class="avatar"><img src="admin/img/admin_img.jpeg" alt="..." class="img-fluid rounded-circle"></div>
        <div class="title">
          <h1 class="h5">Admin</h1>
          <p>Admin</p>
        </div>
      </div>
      <!-- Sidebar Navidation Menus--><span class="heading">Main</span>
      <ul class="list-unstyled">
              <li class="active"><a href="{{url('/admin_dashboard')}}"> <i class="icon-home"></i>Home </a></li>
              
              <li><a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i class="icon-windows"></i>Hotel Rooms </a>
                <ul id="exampledropdownDropdown" class="collapse list-unstyled ">
                  <li><a href="{{url('create_room')}}">Add Room</a></li>
                  <li><a href="{{url('view_rooms')}}">View Rooms</a></li>
                  
                </ul>
              </li>
              <li><a href="{{url('bookings')}}"> <i class="icon-home"></i>Bookings </a></li>
              <li><a href="{{url('view_gallary')}}"> <i class="icon-home"></i>Gallary </a></li>
              <li><a href="{{url('contact_messages')}}"> <i class="icon-home"></i>Messages </a></li>
      </ul>
    </nav>

    <script>
<script type='text/javascript'>
$(window).load(function(){
$(".list-unstyled a").click(function() {
    $('a').removeClass('active');
    $(this).addClass("active");
});
});>  
</script>


    </script>