<!DOCTYPE html>
<html lang="en">
   <head>
        <base href="/public">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
      @include('home.css')
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
      
      <style>
        .our_room {
            padding: 0;
            background-color: #ffffff;
        }

        .titlepage {
            text-align: center;
            margin-bottom: 10px;
        }

        .titlepage h2 {
            font-size: 36px;
            color: #333;
            margin-bottom: 10px;
        }

        .titlepage p {
            font-size: 18px;
            color: #666;
        }

        .room {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            margin-bottom: 30px;
        }

        .room_img {
            overflow: hidden;
        }

        .room_img img {
            width: 100%;
            height: auto;
            transition: transform 0.3s ease;
        }

        .room:hover .room_img img {
            transform: scale(1.05);
        }

        .bed_room {
            padding: 20px;
        }

        .bed_room h2 {
            font-size: 24px;
            color: #333;
            margin-bottom: 10px;
        }

        .bed_room p {
            font-size: 16px;
            color: #666;
            margin-bottom: 15px;
        }

        .bed_room h4 {
            font-size: 18px;
            color: #444;
            margin-bottom: 10px;
        }

        .bed_room h3 {
            font-size: 22px;
            color: #28a745;
            font-weight: bold;
        }

        .booking-form {
            background-color: rgb(255,255,255,0.1);
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 30px;
        }

        .booking-form h1 {
            font-size: 28px;
            color: #333;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            font-size: 16px;
            color: #444;
            margin-bottom: 5px;
        }

        .form-control {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
        }

        .btn-calculate {
            background-color: #6c757d;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .btn-calculate:hover {
            background-color: #5a6268;
        }

        .btn-book {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 12px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            width: 100%;
            font-size: 18px;
        }

        .btn-book:hover {
            background-color: #0056b3;
        }

        #totalPriceDisplay {
            font-size: 18px;
            color: #28a745;
            margin-top: 10px;
            font-weight: bold;
        }

        .alert {
            padding: 15px;
            margin-bottom: 20px;
            border: 1px solid transparent;
            border-radius: 5px;
        }

        .alert-success {
            color: #155724;
            background-color: #d4edda;
            border-color: #c3e6cb;
        }

        .close {
            float: right;
            font-size: 20px;
            font-weight: bold;
            line-height: 1;
            color: #000;
            opacity: 0.5;
            background: none;
            border: none;
            cursor: pointer;
        }

        .error-list {
            color: #721c24;
            background-color: #f8d7da;
            border: 1px solid #f5c6cb;
            border-radius: 5px;
            padding: 10px;
            margin-bottom: 20px;
        }

        .error-list li {
            list-style-type: none;
            margin-bottom: 5px;
        }

      </style>
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

      


      <div class="our_room">
         <div class="container">
             <div class="row">
                 <div class="col-md-12">
                     <div class="titlepage">
                         <h2>Our Room</h2>
                         
                     </div>
                 </div>
             </div>
     
             <div class="row">
                 <div class="col-md-8">
                     <div class="room">
                         <div class="room_img">
                             <img src="/room/{{$room->image}}" alt="#"/>
                         </div>
                         <div class="bed_room" >
                             <h2>{{$room->room_title}}</h2>
                             <p>{{$room->description}}</p>
                             <div class="room-features" style="display: flex; justify-content: center; gap: 30px; align-items: center;">
                                <div class="feature-item" style="text-align:center;">
                                    <i class="fa-solid fa-wifi"></i>
                                    
                                    <br>
                                    <span class="feature-text" style="font-size: 18px;">{{$room->wifi}}</span>
                                </div>
                                <div class="feature-item" style="text-align:center;">
                                    @if($room->room_type == 'premium')
                                        <i class="fa-regular fa-star fa-xl" style="color: #FFD43B;"></i> 
                                    @elseif ($room->room_type == 'deluxe')
                                        <i class="fa-regular fa-star fa-xl"></i>
                                    @else
                                        <i class="fas fa-bed"></i>
                                    @endif
                                    <br>
                                    <span class="feature-text" style="font-size: 18px;">{{$room->room_type}}</span>
                                </div>
                                <div class="feature-item" style="text-align:center;">
                                    <img src="admin/img/dollar.png" alt="price" style="width:24px;" class="feature-icon">
                                    <br>
                                    <span class="feature-text" style="font-size: 18px;">${{$room->price}}/day</span>
                                </div>
                            </div>
                         </div>
                     </div>
                 </div>
     
                 <div class="col-md-4">
                     <div class="booking-form">
                         <h1>Book Room</h1>
                         
                         @if(session()->has('message'))
                             <div class="alert alert-success">
                                 <button type="button" class="close" data-bs-dismiss='alert'>X</button>
                                 {{session()->get('message')}}
                             </div>
                         @endif
     
                         @if($errors->any())
                             <ul class="error-list">
                                 @foreach ($errors->all() as $error)
                                     <li>{{$error}}</li>
                                 @endforeach
                             </ul>
                         @endif
     
                         <form action="{{url('add_booking',$room->id)}}" method="Post">
                             @csrf
                             <div class="form-group">
                                 <label for="name">Name</label>
                                 <input type="text" style="border: 1px solid #add8e6; border-radius: 4px" class="form-control" id="name" placeholder="Name" name="name" value="{{ Auth::id() ? Auth::user()->name : '' }}">
                             </div>
     
                             <div class="form-group">
                                 <label for="email">Email</label>
                                 <input type="email" style="border: 1px solid #add8e6; border-radius: 4px" class="form-control" id="email" placeholder="Email" name="email" value="{{ Auth::id() ? Auth::user()->email : '' }}">
                             </div>
     
                             <div class="form-group">
                                 <label for="phone">Phone</label>
                                 <input type="number" style="border: 1px solid #add8e6; border-radius: 4px" class="form-control" id="phone" placeholder="Phone" name="phone" value="{{ Auth::id() ? Auth::user()->phone : '' }}">
                             </div>
     
                             <div class="form-group">
                                 <label for="startDate">Start Date</label>
                                 <input type="date" style="border: 1px solid #add8e6; border-radius: 4px" class="form-control" id="startDate" placeholder ="yyyy-mm-dd" name="startDate">
                             </div>
     
                             <div class="form-group">
                                 <label for="endDate">End Date</label>
                                 <input type="date" style="border: 1px solid #add8e6; border-radius: 4px" class="form-control" id="endDate" placeholder ="yyyy-mm-dd" name="endDate">
                             </div>
     
                             <button type="button" id="calculatePriceBtn" class="btn-calculate">Calculate Total Price</button>
     
                             <div id="totalPriceDisplay"></div>
     
                             <div class="form-group">
                                 <input type="submit" class="btn-book" value="Book Room">
                             </div>
                         </form>
                     </div>
                 </div>
             </div>
         </div>
     </div>
     




      <!-- end header inner -->
      <!-- end header -->
      <!-- banner -->
      
      <!-- end contact -->
      <!--  footer -->
      @include('home.footer')
        
      <script>
            document.getElementById('calculatePriceBtn').addEventListener('click', function() {
               var startDate = document.getElementById('startDate').value;
               var endDate = document.getElementById('endDate').value;
               var pricePerNight = {{$room->price}};  // Replace with your actual price per night value
               
               if (startDate && endDate) {
                  // Convert input values to Date objects
                  var start = new Date(startDate);
                  var end = new Date(endDate);
                  
                  // Calculate the difference in days
                  var timeDiff = end - start;
                  var daysDiff = timeDiff / (1000 * 3600 * 24);
                  
                  if (daysDiff > 0) {
                        // Calculate the total price
                        var totalPrice = daysDiff * pricePerNight;
                        
                        // Display the total price
                        document.getElementById('totalPriceDisplay').textContent = 'Total Price: $' + totalPrice.toFixed(2);
                  } else {
                        document.getElementById('totalPriceDisplay').textContent = 'Please select a valid date range.';
                  }
               } else {
                  document.getElementById('totalPriceDisplay').textContent = 'Please select both start and end dates.';
               }
            });
     </script>
      
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
   
   
   
      <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
      
      <script>
                  document.addEventListener('DOMContentLoaded', function () {
            // Get today's date
            const today = new Date().toISOString().split('T')[0];
            
            // Set the minimum date for both inputs to today
            document.getElementById('startDate').min = today;
            document.getElementById('endDate').min = today;
            
            // Add event listener to startDate to ensure endDate is not before startDate
            document.getElementById('startDate').addEventListener('change', function() {
               document.getElementById('endDate').min = this.value;
            });

            // Flatpickr setup
            var bookedDates = @json($bookedDates);  // Inject booked dates from Blade
            
            flatpickr("#startDate", {
               disable: bookedDates.map(date => new Date(date)),
               minDate: "today",  // Ensures no past dates can be selected
               dateFormat: "Y-m-d",
               onChange: function(selectedDates) {
                     // Adjust end date picker minDate when start date changes
                     if (selectedDates.length > 0) {
                        document.getElementById('endDate')._flatpickr.set('minDate', selectedDates[0]);
                     }
               }
            });

            flatpickr("#endDate", {
               disable: bookedDates.map(date => new Date(date)),
               minDate: "today",  // Ensures no past dates can be selected
               dateFormat: "Y-m-d"
            });
         });

     </script>
   
   </body>
</html>