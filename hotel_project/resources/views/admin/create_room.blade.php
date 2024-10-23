<!DOCTYPE html>
<html>
    <meta name="csrf-token" content="{{ csrf_token() }}">
  <head> 
    @include('admin.css')
    <style>
        .unread-message {
        background-color: #3c4242  ;
        font-weight: bold;
        }
        body {
    background-color: #1b1e23;
    font-family: 'Arial', sans-serif;
    color: #f5f5f5;
    margin: 0;
    padding: 0;
}

.div_center {
    width: 50%;
    margin: 50px auto;
    background-color: #2c2f33;
    padding: 30px;
    border-radius: 10px;
    box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.5);
}

h1 {
    color: #f5f5f5;
    text-align: center;
    margin-bottom: 20px;
}

.div_deg {
    margin-bottom: 20px;
}

label {
    display: block;
    font-size: 14px;
    font-weight: bold;
    margin-bottom: 5px;
    color: #9aa0a6;
}

input[type="text"],
input[type="number"],
textarea,
select {
    width: 100%;
    padding: 10px;
    background-color: #4c4d57;
    border: none;
    border-radius: 5px;
    color: #c4c4c4;
    font-size: 14px;
}

input[type="file"] {
    color: #9aa0a6;
    margin-top: 5px;
}

.btn {
    width: 100%;
    padding: 12px;
    border: none;
    border-radius: 5px;
    font-size: 16px;
    font-weight: bold;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.btn-primary {
    background-color: #f53b57;
    color: #f5f5f5;
}

.btn-primary:hover {
    background-color: #ff4d6a;
}
#sidebar {
        position: -webkit-sticky; /* Safari */
        position: sticky;
        top: 0; /* The sidebar will stick when the user scrolls past the top */
        height: 100vh; /* Optional: Make sure it covers the full height */
        overflow-y: auto; /* Optional: If the sidebar is longer than the viewport, make it scrollable */
        z-index: 1000; /* Optional: Ensure it stays on top of other elements */
    }
    .logout-button {
    background-color: transparent;
    border: 1px solid #888;  /* Adjust border color for better contrast */
    color: #cccccc;  /* Light gray text color to match the dark theme */
    font-weight: 500;
    padding: 8px 18px;  /* Smaller padding for a more compact button */
    border-radius: 6px;
    cursor: pointer;
    display: flex;
    align-items: center;
    gap: 8px;  /* Space between text and icon */
    transition: all 0.3s ease;
}

.logout-button:hover {
    background-color: #ff4b5c;  /* Highlight with a red background */
    color: #ffffff;  /* White text on hover */
    border-color: #ff4b5c;  /* Change border color to red on hover */
}

.logout-button:focus {
    outline: none;
    box-shadow: 0 0 8px rgba(255, 75, 92, 0.5);  /* Subtle shadow effect */
}

.logout-button i {
    font-size: 1rem;  /* Icon size */
    color: inherit;  /* Match icon color with text */
}
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
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
                <h1 style="font-size: 30px; font-weight: bold">Add Rooms :</h1>
                <form action="{{url('add_room')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="div_deg">
                        <label>Room Title</label>
                        <input style="background-color: #3b3f45; color: #f5f5f5" type="text" name="title">
                    </div>

                    <div class="div_deg">
                        <label >Description</label>
                        <textarea style="background-color: #3b3f45; color: #f5f5f5" name="Description" id="" cols="20" rows="3"></textarea>
                    </div>

                    <div class="div_deg">
                        <label >Price</label>
                        <input style="background-color: #3b3f45; color: #f5f5f5" class="price-input" type="numbre" name="price">
                    </div>

                    <div class="div_deg">
                        <label >Room Type</label>
                        <select style="background-color: #3b3f45; color: #f5f5f5" name="type" >
                            <option selected value="regular">Regular</option>
                            <option value="premium">Premium</option>
                            <option value="deluxe">Deluxe</option>
                        </select>
                    </div>

                    <div class="div_deg">
                        <label >Free Wifi</label>
                        <select style="background-color: #3b3f45; color: #f5f5f5" name="wifi" >
                            <option selected value="yes">Yes</option>
                            <option value="no">No</option>
                        </select>
                    </div>
                    
                    <div class="div_deg">
                        <label >Upload Image</label>
                        <input  type="file" name="image" >
                    </div>

                    <div class="div_deg">
                        <input class="btn btn-primary" type="submit" value="Add Room">
                    </div>
                </form>
            </div>


          </div>
        </div>
      </div>
      

        @include('admin.footer')
  </body>
</html>