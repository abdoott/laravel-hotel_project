<!DOCTYPE html>
<html>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <head> 
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

      .form-container {
          width: 50%;
          margin: 50px auto;
          background-color: #2c2f33; /* Form background */
          padding: 20px;
          border-radius: 8px;
          box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);
      }

      .div_deg {
          margin-bottom: 20px;
      }

      .div_deg label {
          display: block;
          color: #9aa0a6;
          font-size: 14px;
          font-weight: bold;
          margin-bottom: 5px;
      }

      input[type="text"], textarea, select {
          width: 100%;
          padding: 10px;
          background-color: #4c4d57;
          border: none;
          border-radius: 5px;
          color: #c4c4c4;
          font-size: 14px;
      }

      input[type="file"] {
          background-color: #4c4d57;
          color: #c4c4c4;
          border: none;
          padding: 10px;
          width: 100%;
      }

      input[type="submit"] {
          background-color: #f53b57;
          color: #f5f5f5;
          border: none;
          padding: 12px;
          border-radius: 5px;
          cursor: pointer;
          width: 100%;
          font-size: 16px;
          font-weight: bold;
      }

      input[type="submit"]:hover {
        background-color: #ff4d6a;
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
    <base href="/public">
    @include('admin.css')
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
            <div class="form-container">
            <h1 style="font-size: 30px; font-weight: bold; color: #f5f5f5; text-align: center; margin-bottom: 20px">Send mail to {{$send->name}}</h1>

                <form action="{{url('mail', $send->id)}}" method="POST">
                    @csrf
                    <div class="div_deg">
                        <label>Greeting</label>
                        <input style="background-color: #3b3f45; color: #f5f5f5" type="text" name="greeting">
                    </div>
            
                    <div class="div_deg">
                        <label>Mail Body</label>
                        <textarea style="background-color: #3b3f45; color: #f5f5f5" name="mail" cols="20" rows="3"></textarea>
                    </div>
            
                    <div class="div_deg">
                        <label>Action Text</label>
                        <input style="background-color: #3b3f45; color: #f5f5f5" class="price-input" type="text" name="action_text">
                    </div>
            
                    <div class="div_deg">
                        <label>Action Url</label>
                        <input style="background-color: #3b3f45; color: #f5f5f5" class="price-input" type="text" name="action_url">
                    </div>
            
                    <div class="div_deg">
                        <label>End Line</label>
                        <input style="background-color: #3b3f45; color: #f5f5f5" class="price-input" type="text" name="end_line">
                    </div>
            
                    <div class="div_deg">
                        <input  class="btn btn-primary" type="submit" value="Send email">
                    </div>
                </form>
            </div>

          </div>
        </div>
      </div>
        @include('admin.footer')
  </body>
</html>