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
           @foreach ($rooms as $rooms)
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
           <div class="row">
                <div class="col-md-12 text-center">
                    <a class="btn-all-rooms" href="{{ url('our_rooms') }}">All Rooms</a>
                </div>
            </div>
       </div>
   </div>
</div>
