<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
      .unread-message {
        background-color: #3c4242  ;
        font-weight: bold;
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
            <center>
                <h1 style="font-size: 40px; font-weight: bold; color: white">Gallary</h1>
              <div class="row">
                @foreach ($data as $gallary)
                  <div class="col-md-4">
                      <img style="width: 300px; height: 200px;" src="gallary/{{$gallary->image}}" alt="">
                      <a style="margin: 5px; margin-bottom: 15px" class="btn btn-danger" href="{{url('delete_gallary',$gallary->id)}}">Delete Image</a>
                  </div>  
                @endforeach
              </div>

                <form action="{{url('upload_gallary')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div style="padding: 30px">
                        <label style="color: white; font-weight: bold">Upload Image</label>
                        <input type="file" name="image" required>

                        <input class="btn btn-primary" type="submit" value="Add Image">
                    </div>
                </form>
            </center>

          </div>
        </div>
      </div>


        @include('admin.footer')
  </body>
</html>