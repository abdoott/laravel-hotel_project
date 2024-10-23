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
        /* General styles */
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
    font-size: 14px;
}

.th_deg {
    background-color: #2c2c2c;
    color: #3498db;
    font-weight: bold;
    padding: 12px 10px;
    text-align: left;
    text-transform: uppercase;
    white-space: nowrap;
}

.table_deg td {
    background-color: #2c2c2c;
    padding: 12px 10px;
    vertical-align: middle;
}

/* Specific column widths */
.table_deg td:nth-child(1) /* Room Title */ {
    width: 15%;
}
.table_deg td:nth-child(2) /* Description */ {
    width: 25%;
}
.table_deg td:nth-child(3), /* Price */
.table_deg td:nth-child(4), /* Wifi */
.table_deg td:nth-child(5) /* Room Type */ {
    width: 10%;
}
.table_deg td:nth-child(6) /* Image */ {
    width: 15%;
}
.table_deg td:nth-child(7), /* Delete */
.table_deg td:nth-child(8) /* Update */ {
    width: 7.5%;
}

/* Description cell styles */
.table_deg td:nth-child(2) {
    white-space: normal;
    word-break: break-word;
}

/* Image styles */
.table_deg img {
    max-width: 100px;
    height: auto;
    border-radius: 4px;
}

/* Button styles */
.btn {
    padding: 6px 12px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-weight: bold;
    text-decoration: none;
    display: inline-block;
    font-size: 12px;
    text-align: center;
    width: 100%;
    margin-bottom: 5px;
}

.btn-danger {
    background-color: #e74c3c;
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
        padding: 10px 8px;
    }
    
    .btn {
        padding: 5px 10px;
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

    .table_deg td:nth-child(6), /* Image */
    .table_deg td:nth-child(7), /* Delete */
    .table_deg td:nth-child(8) /* Update */ {
        text-align: center;
        padding-left: 10px;
    }

    .table_deg img {
        max-width: 100%;
        height: auto;
    }

    .btn {
        display: inline-block;
        width: auto;
        margin: 5px;
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
                        <th class="th_deg">Room Title</th>
                        <th class="th_deg">Description</th>
                        <th class="th_deg">Price</th>
                        <th class="th_deg">Wifi</th>
                        <th class="th_deg">Room Type</th>
                        <th class="th_deg">Image</th>
                        <th class="th_deg">Delete</th>
                        <th class="th_deg">Update</th>
                    </tr>
                    @foreach ($view as $data)
                    <tr>
                        <td>{{$data->room_title}}</td>
                        <td>{!! Str::limit($data->description, 150) !!}</td>
                        <td>{{$data->price}}$</td>
                        <td>{{$data->wifi}}</td>
                        <td>{{$data->room_type}}</td>
                        <td>
                          <img width="100" src="room/{{$data->image}}" >
                        </td>
                        <td>
                          <a onclick="return confirm('are you sure to delete this')" class="btn btn-danger" href="{{url('room_delete',$data->id)}}">delete</a>
                        </td>
                        <td>
                          <a  class="btn btn-warning" href="{{url('room_update',$data->id)}}">update</a>
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