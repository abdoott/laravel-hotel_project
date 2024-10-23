<div class="d-flex align-items-stretch">
<nav id="sidebar">
    <!-- Sidebar Header-->
    <div class="sidebar-header d-flex align-items-center">
      <div class="avatar"><img src="admin/img/addq.jpg" alt="..." class="img-fluid rounded-circle"></div>
      <div class="title">
        <h1 class="h5">Admin</h1>
        <p>John Smith</p>
      </div>
    </div>
    <!-- Sidebar Navidation Menus--><span class="heading">Main</span>
    <ul class="list-unstyled">
            <li class="active"><a href="{{url('home')}}"> <i class="icon-home"></i>Home </a></li>
            <li><a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i class="fa-solid fa-hotel"></i>Hotel Rooms </a>
              <ul id="exampledropdownDropdown" class="collapse list-unstyled ">
                <li><a href="{{url('create_room')}}">Add Rooms</a></li>
                <li><a href="{{url('view_room')}}">View Rooms</a></li>
              </ul>
            </li>
            <li ><a href="{{url('boookings')}}"> <i class="fas fa-calendar-alt"></i>Booking </a></li>
            <li ><a href="{{url('gallary_view')}}"> <i class="fas fa-images"></i>Gallary </a></li>
            <li ><a href="{{url('messages')}}"> <i class="fa-solid fa-message"></i>Messages </a></li>
            
    </ul>
  </nav>