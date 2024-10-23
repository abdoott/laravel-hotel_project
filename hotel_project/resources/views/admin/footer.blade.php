<footer class="footer">
    <div class="footer__block block no-margin-bottom">
      <div class="container-fluid text-center">
        <!-- Please do not remove the backlink to us unless you support us at https://bootstrapious.com/donate. It is part of the license conditions. Thank you for understanding :)-->
         <p class="no-margin-bottom">2024 &copy; KETO. All rights reserved.</p>
      </div>
    </div>
  </footer>
</div>
</div>

@php
use Carbon\Carbon;
    $bookingsLast7Days = \App\Models\Booking::select(
                    DB::raw('DATE(created_at) as date'), 
                    DB::raw('count(*) as count')
                )
                ->where('created_at', '>=', Carbon::today()->subDays(6))  // 7 days including today
                ->groupBy('date')
                ->get()
                ->pluck('count', 'date')
                ->toArray();
        
            // Fill missing dates with zero counts for the last 7 days
            $last7Days = collect(range(0, 6))->mapWithKeys(function ($day) {
                $date = Carbon::today()->subDays($day)->toDateString();
                return [$date => 0];
            });
        
            $bookingsLast7Days = array_merge($last7Days->toArray(), $bookingsLast7Days);
@endphp
@php
use App\Models\Booking;
use App\Models\Room;

    $today = Carbon::today();
    $last7DaysRevenue = [];

    // Loop through the last 7 days
    for ($i = 0; $i < 7; $i++) {
        $date = $today->copy()->subDays($i);

        // Calculate revenue for each day
        $dailyRevenue = Booking::where('status', 'approved')
            ->whereDate('start_date', '<=', $date)
            ->whereDate('end_date', '>=', $date)
            ->join('rooms', 'bookings.room_id', '=', 'rooms.id')  // Joining rooms table
            ->sum('rooms.price');  // Summing up the prices

        // Add to the array
        $last7DaysRevenue[] = [
            'date' => $date->format('Y-m-d'),
            'revenue' => $dailyRevenue,
        ];
    }

    // Reverse the order to show oldest date first
    $last7DaysRevenue = array_reverse($last7DaysRevenue);
    

@endphp
<!-- JavaScript files-->
<script src="admin/vendor/jquery/jquery.min.js"></script>
<script src="admin/vendor/popper.js/umd/popper.min.js"> </script>
<script src="admin/vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="admin/vendor/jquery.cookie/jquery.cookie.js"> </script>
<script src="admin/vendor/chart.js/Chart.min.js"></script>
<script src="admin/vendor/jquery-validation/jquery.validate.min.js"></script>
<script src="admin/js/charts-home.js"></script>
<script src="admin/js/front.js"></script>

<script>
  function fetchUnreadMessages() {
      fetch('/unread-messages', {
          headers: {
              'X-Requested-With': 'XMLHttpRequest',
              'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
          }
      })
      .then(response => response.json())
      .then(data => {
          const badge = document.getElementById('message-badge');
          if (data.unreadCount > 0) {
              badge.innerText = data.unreadCount;
              badge.style.display = 'inline'; // Show the badge
          } else {
              badge.style.display = 'none'; // Hide the badge if there are no unread messages
          }
      })
      .catch(error => console.error('Error fetching unread messages:', error));
  }

  function markMessageAsRead(id) {
    fetch('/mark-message-as-read/' + id, {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            'Content-Type': 'application/json',
            'X-Requested-With': 'XMLHttpRequest'
        },
        body: JSON.stringify({ id: id })
    })
    .then(response => response.json())
    .then(data => {
        if (data.status === 'success') {
            fetchUnreadMessages(); // Refresh the unread message count
            // Update the UI to reflect the message as read
            document.querySelector(`.message-${id}`).classList.remove('unread-message');
        }
    })
    .catch(error => console.error('Error marking message as read:', error));
}


  setInterval(fetchUnreadMessages, 5000); // Every 5 seconds
  fetchUnreadMessages(); // Initial fetch on page load
</script>


<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  var bookingsLast7Days = @json(array_values($bookingsLast7Days)).reverse(); // Pass PHP array as JavaScript array
  var datesLast7Days = @json(array_keys($bookingsLast7Days)).reverse(); // Get the dates as labels

  var ctx = document.getElementById('lineCahrt').getContext('2d');
  var myChart = new Chart(ctx, {
    type: 'line',
    data: {
      labels: datesLast7Days, // Use the dates for the last 7 days as X-axis values
      datasets: [
        {
          label: 'Last 7 Days Booking',
          data: bookingsLast7Days, // Y-axis values for the last 7 days bookings
          borderColor: 'rgba(75, 192, 192, 1)', // Teal color
          backgroundColor: 'rgba(75, 192, 192, 0.2)',
          fill: false,
          tension: 0.4,
          pointBorderColor: 'teal',
          pointBackgroundColor: 'teal',
        }
      ]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true,
          max: 20 // Adjust the maximum Y-axis value if needed
        }
      }
    }
  });
</script>


<script>
  var revenueData = @json(collect($last7DaysRevenue)->pluck('revenue'));
  var revenueLabels = @json(collect($last7DaysRevenue)->pluck('date'));
var ctx = document.getElementById('revenueChart').getContext('2d');
    
    
    
    
  var myChart = new Chart(ctx, {
    type: 'line',
    data: {
      labels: revenueLabels, // Use the dates for the last 7 days as X-axis values
      datasets: [
        {
          label: 'Last 7 Days Revenue',
          data: revenueData, // Y-axis values for the last 7 days bookings
          borderColor: 'rgba(170, 0, 255, 0.4)', // Teal color
          backgroundColor: 'rgba(170, 0, 255, 0.3)',
          fill: false,
          tension: 0.4,
          pointBorderColor: 'rgba(165, 55, 253, 1)',
          pointBackgroundColor: 'rgba(165, 55, 253, 1)',
        }
      ]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true,
          max: 820 // Adjust the maximum Y-axis value if needed
        }
      }
    }
  });
    </script>




