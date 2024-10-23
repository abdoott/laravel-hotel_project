<div class="page-content">
    <div class="page-header">
      <div class="container-fluid">
        <h2 class="h5 no-margin-bottom">Dashboard</h2>
      </div>
    </div>
    <section class="no-padding-top no-padding-bottom">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3 col-sm-6">
            <div class="statistic-block block">
              <div class="progress-details d-flex align-items-end justify-content-between">
                <div class="title">
                  <div class="icon"><ion-icon name="bed"></ion-icon></div><strong>Total Rooms</strong>
                </div>
                <div class="number dashtext-1">{{$roomCount}}</div>
              </div>
              <div class="progress progress-template">
                <div role="progressbar" style="width: 100%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100" class="progress-bar progress-bar-template dashbg-1"></div>
              </div>
            </div>
          </div>
          <div class="col-md-3 col-sm-6">
            <div class="statistic-block block">
              <div class="progress-details d-flex align-items-end justify-content-between">
                <div class="title">
                  <div class="icon"><ion-icon name="key-outline"></ion-icon></div><strong>reserved room</strong>
                </div>
                <div class="number dashtext-2">{{$reservedRoomCount}}</div>
              </div>
              <div class="progress progress-template">
                <div role="progressbar" style="width: {{$reserved}}%" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" class="progress-bar progress-bar-template dashbg-2"></div>
              </div>
            </div>
          </div>
          <div class="col-md-3 col-sm-6">
            <div class="statistic-block block">
              <div class="progress-details d-flex align-items-end justify-content-between">
                <div class="title">
                  <div class="icon"><ion-icon name="checkmark-circle"></ion-icon></div><strong>available rooms</strong>
                </div>
                <div class="number dashtext-3">{{$availableRoomCount}}</div>
              </div>
              <div class="progress progress-template">
                <div role="progressbar" style="width: {{$available}}%" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100" class="progress-bar progress-bar-template dashbg-3"></div>
              </div>
            </div>
          </div>
          <div class="col-md-3 col-sm-6">
            <div class="statistic-block block">
              <div class="progress-details d-flex align-items-end justify-content-between">
                <div class="title">
                  <div class="icon"><ion-icon name="cash-outline"></ion-icon></div><strong>Today Revenue</strong>
                </div>
                <div class="number dashtext-4">{{$totalRevenueToday}}$</div>
              </div>
              <div class="progress progress-template">
                <div role="progressbar" style="width: {{$revenue}}%" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100" class="progress-bar progress-bar-template dashbg-4"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="no-padding-bottom">
      <div class="container-fluid">
        <div class="row">
          
          <div class="col-lg-6">
            <div class="line-cahrt block">
              <canvas id="lineCahrt"></canvas>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="line-cahrt block">
              <canvas id="revenueChart"></canvas> 
          </div>
          </div>
        </div>
      </div>
    </section>
    
    
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>