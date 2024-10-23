<!DOCTYPE html>
<html lang="en">
   <head>

      @include('home.css')
      <style>
         .our_room {
    background-color: #f9f9f9; /* Light background */
    padding: 60px 0;
}

.room {
    background-color: #fff;
    border-radius: 10px;
    overflow: hidden;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    margin-bottom: 30px;
}

.room:hover {
    transform: translateY(-10px);
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
}

.room_img figure {
    margin: 0;
    height: 250px;
    overflow: hidden;
}

.room_img img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.3s ease;
}

.room_img img:hover {
    transform: scale(1.1);
}

.bed_room {
    padding: 20px;
    text-align: center;
}

.bed_room h3 {
    font-size: 24px;
    font-weight: bold;
    color: #333;
    margin-bottom: 15px;
}

.bed_room p {
    font-size: 14px;
    color: #777;
    margin-bottom: 20px;
}

.btn-room-details {
    display: inline-block;
    background-color: #007BFF;
    color: #fff;
    padding: 10px 20px;
    text-align: center;
    font-size: 16px;
    font-weight: bold;
    text-transform: uppercase;
    text-decoration: none;
    letter-spacing: 1px;
    border-radius: 5px;
    transition: background-color 0.3s ease;
}

.btn-room-details:hover {
    background-color: #0056b3;
    color: #fff;
}

      </style>
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
      </head>
   <!-- body -->
   <body class="main-layout">
      <!-- loader  -->
      <div class="loader_bg">
         <div class="loader"><img src="images/loading.gif" alt="#"/></div>
      </div>
      <!-- end loader -->
      <!-- header -->
      <header>

         @include('home.header')

      </header>
      <!-- end header inner -->
      <!-- end header -->
      <!-- banner -->
     
      <!-- end banner -->
      <!-- about -->
      
      <!-- end about -->
      <!-- our_room -->
      <div class="our_room">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="titlepage">
                        <h2>Our Room</h2>
                        <p>Lorem Ipsum available, but the majority have suffered</p>
                    </div>
                </div>
            </div>
     
            <div class="row">
                @foreach ($room as $rooms)
                <div class="col-md-4 col-sm-6">
                    <div class="room">
                        <div class="room_img">
                            <figure><img src="/room/{{$rooms->image}}" alt="#"/></figure>
                        </div>
                        <div class="bed_room">
                            <h3>{{$rooms->room_title}}</h3>
                            <p>{!! Str::limit($rooms->description, 100) !!}</p>
                            <a class="btn-room-details" href="{{url('room_details',$rooms->id)}}">Room Details</a>
                        </div>
                    </div>
                </div>
                @endforeach
                
            </div>
        </div>
     </div>
      <!-- end our_room -->
      <!-- gallery -->
      
      <!-- end gallery -->
      <!-- blog -->
      
      <!-- end blog -->
      <!--  contact -->
      
      <!-- end contact -->
      <!--  footer -->
      @include('home.footer')

      
        
   </body>
</html>