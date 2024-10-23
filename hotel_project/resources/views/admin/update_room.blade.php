<!DOCTYPE html>
<html>
  <head> 
    <base href="/public">
    @include('admin.css')
    <style>
        label{
            display: inline-block;
            width: 200px
        }
        .div_deg{
            padding-top: 30px; 
        }
        .div_center{
            text-align: center;
            padding-top: 40px;
        }
        .price-input {
            display: inline-block;
            width: 200px; /* Adjust the width to make it bigger */
            padding: 5px; /* Optional: add padding for better appearance */
        }
    </style>
  </head>
  <body>
    <header class="header">   
      @include('admin.header')
    </header>
      <!-- Sidebar Navigation-->
      @include('admin.sidebar')
      <!-- Sidebar Navigation end-->
      
      <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">

            <div class="div_center">
                <h1 style="font-size: 30px; font-weight: bold">Update Room :</h1>
                <form action="{{url('edit_room',$update_room->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="div_deg">
                        <label >Room Title</label>
                        <input type="text" name="title" value="{{$update_room->room_title}}">
                    </div>

                    <div class="div_deg">
                        <label >Description</label>
                        <textarea  name="Description" id="" cols="20" rows="3">{{$update_room->description}}</textarea>
                    </div>

                    <div class="div_deg">
                        <label >Price</label>
                        <input class="price-input" type="numbre" name="price" value="{{$update_room->price}}">
                    </div>

                    <div class="div_deg">
                        <label >Room Type</label>
                        <select name="type" >
                            <option selected value="{{$update_room->room_type}}">{{$update_room->room_type}}</option>

                            <option  value="regular">Regular</option>
                            <option value="premium">Premium</option>
                            <option value="deluxe">Deluxe</option>
                        </select>
                    </div>

                    <div class="div_deg">
                        <label >Free Wifi</label>
                        <select name="wifi" >
                            <option selected value="{{$update_room->wifi}}">{{$update_room->wifi}}</option>

                            <option value="yes">Yes</option>
                            <option value="no">No</option>
                        </select>
                    </div>
                    
                    <div class="div_deg" >
                        <label >Current Image</label>
                        <img width="100"  src="/room/{{$update_room->image}}" style="margin: auto">
                    </div>


                    <div class="div_deg">
                        <label >Upload Image</label>
                        <input type="file" name="image" >
                    </div>

                    <div class="div_deg">
                        <input class="btn btn-primary" type="submit" value="Update Room">
                    </div>
                </form>
            </div>


          </div>
        </div>
      </div>
      

        @include('admin.footer')
  </body>
</html>