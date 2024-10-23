<!DOCTYPE html>
<html>
    <meta name="csrf-token" content="{{ csrf_token() }}">
  <head> 
    @include('admin.css')
    <style>
       .unread-message {
        background-color: #3c4242  ;
        font-weight: bold;}
    body {
        background-color: #1e1e1e;
        color: #ffffff;
        font-family: Arial, sans-serif;
    }

    /* Table styles */
    .table_deg {
        width: 100%;
        border-collapse: separate;
        border-spacing: 0 10px;
        margin-top: 20px;
        font-size: 14px; /* Reduced font size */
    }

    .th_deg {
        background-color: #2c2c2c;
        color: #3498db;
        font-weight: bold;
        padding: 10px 8px; /* Reduced padding */
        text-align: left;
        text-transform: uppercase;
        white-space: nowrap; /* Prevent header text wrapping */
    }

    .table_deg td {
        background-color: #2c2c2c;
        padding: 10px 8px; /* Reduced padding */
        max-width: 150px; /* Limit maximum width */
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }

    /* Specific column widths */
    .table_deg td:nth-child(1), /* Room ID */
    .table_deg td:nth-child(9) /* Price */ {
        width: 5%;
    }

    .table_deg td:nth-child(2), /* Customer Name */
    .table_deg td:nth-child(8) /* Room Title */ {
        width: 10%;
    }

    .table_deg td:nth-child(3), /* Email */
    .table_deg td:nth-child(4) /* Phone */ {
        width: 15%;
    }

    .table_deg td:nth-child(5), /* Arrival Date */
    .table_deg td:nth-child(6) /* Leaving Date */ {
        width: 8%;
    }

    .table_deg td:nth-child(7) /* Status */ {
        width: 7%;
    }

    .table_deg td:nth-child(10) /* Image */ {
        width: 5%;
    }

    .table_deg td:nth-child(11), /* Delete */
    .table_deg td:nth-child(12) /* Status Update */ {
        width: 6%;
    }

    /* Status colors */
    .table_deg td[style*="color: red"] {
        color: #e74c3c !important;
    }

    .table_deg td[style*="color: rgb(37, 185, 37)"] {
        color: #2ecc71 !important;
    }

    .table_deg td[style*="color: yellow"] {
        color: #f39c12 !important;
    }

    /* Image styles */
    .table_deg img {
        width: 40px;
        height: 40px;
        object-fit: cover;
        border-radius: 4px;
    }

    /* Button styles */
    .btn {
        padding: 4px 8px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-weight: bold;
        text-decoration: none;
        display: block;
        margin: 2px;
        font-size: 12px;
    }

    .btn-danger {
        background-color: #e74c3c;
        color: white;
    }

    .btn-success {
        background-color: #2ecc71;
        color: white;
    }

    .btn-warning {
        background-color: #f39c12;
        color: white;
    }

    /* Responsive design */
    @media (max-width: 1200px) {
        .table_deg {
            font-size: 12px;
        }
        
        .th_deg, .table_deg td {
            padding: 8px 4px;
        }
        
        .btn {
            padding: 3px 6px;
            font-size: 11px;
        }
    }

    @media (max-width: 768px) {
        .table_deg, .table_deg thead, .table_deg tbody, .table_deg th, .table_deg td, .table_deg tr {
            display: block;
        }
        
        .table_deg thead tr {
            position: absolute;
            top: -9999px;
            left: -9999px;
        }
        
        .table_deg tr {
            margin-bottom: 15px;
            border: 1px solid #3498db;
        }
        
        .table_deg td {
            border: none;
            position: relative;
            padding-left: 50%;
            text-align: right;
            max-width: none;
        }
        
        .table_deg td:before {
            content: attr(data-label);
            position: absolute;
            left: 6px;
            width: 45%;
            padding-right: 10px;
            white-space: nowrap;
            text-align: left;
            font-weight: bold;
            color: #3498db;
        }
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
            <table class="table_deg">
                <tr>
                    <th class="th_deg">Room id</th>
                    <th class="th_deg">Customer name</th>
                    <th class="th_deg">Email</th>
                    <th class="th_deg">Phone</th>
                    <th class="th_deg">Arrival Date</th>
                    <th class="th_deg">Leaving Date</th>
                    <th class="th_deg">Status</th>
                    <th class="th_deg">Room Title</th>
                    <th class="th_deg">Price</th>
                    <th class="th_deg">Image</th>
                    <th class="th_deg">Delete</th>
                    <th class="th_deg">Status Update</th>
                </tr>
                @foreach($data as $data)
                <tr>
                    <td>{{$data->room_id}}</td>
                    <td>{{$data->name}}</td>
                    <td>{{$data->email}}</td>
                    <td>{{$data->phone}}</td>
                    <td>{{$data->start_date}}</td>
                    <td>{{$data->end_date}}</td>
                    @if($data->status == 'rejected')
                      <td style="color: red">{{$data->status}}</td>    
                    @endif
                    @if($data->status == 'approved')
                      <td style="color: rgb(37, 185, 37)">{{$data->status}}</td>
                    @endif
                    @if($data->status == 'waiting')
                      <td style="color: yellow">{{$data->status}}</td>
                    @endif
                    <td>{{$data->room->room_title}}</td>
                    <td>{{$data->room->price}}</td>
                    <td>
                      <img  src="room/{{$data->room->image}}" alt="">
                    </td>
                    <td>
                      <a onclick="return confirm('are you sure to delete the booking')" class="btn btn-danger" href="{{url('booking_delete',$data->id)}}">delete</a>
                    </td>
                    <td>
                      <a  class="btn btn-success" href="{{url('approve_booking',$data->id)}}">Approved</a>
                      <a class="btn btn-warning" href="{{url('reject_booking',$data->id)}}">Rejected</a>
                    </td>
                </tr>
                @endforeach
            </table>



          </div>
        </div>
      </div>
        @include('admin.footer')
  </body>
</html>