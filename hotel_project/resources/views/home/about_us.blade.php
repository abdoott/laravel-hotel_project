<!DOCTYPE html>
<html lang="en">
   <head>

      @include('home.css')

      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
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
      <!-- end header inner -->
      <!-- end header -->
      <!-- banner -->
     
      <!-- end banner -->
      <!-- about -->
      
      <!-- end about -->
      <!-- our_room -->
      <div class="about">
        <div class="container-fluid">
           <div class="row">
              <div class="col-md-5">
                 <div class="titlepage">
                    <h2>About Us</h2>
                    <p>Hotel KETO is more than just a place to stay; it's a luxurious haven where you can escape the ordinary and indulge in the extraordinary. Our commitment to providing exceptional service and amenities is unparalleled, ensuring that your stay is nothing short of unforgettable.
                    </p>
                    <p>Hotel KETO is ideally located in the heart of [City], offering easy access to the city's most iconic attractions and cultural experiences. Discover hidden gems, immerse yourself in local traditions, and create lasting memories.</p>
                    <p>Experience the epitome of luxury and hospitality at Hotel KETO. Whether you're seeking a romantic getaway, a family vacation, or a business retreat, our hotel offers the perfect blend of comfort, elegance, and exceptional service.
                    </p>
                 </div>
              </div>
              <div class="col-md-7">
                 <div class="about_img">
                    <figure><img src="images/about.png" alt="#"/></figure>
                 </div>
              </div>
           </div>
        </div>
     </div>
      <!-- end our_room -->
      <!-- gallery -->
      
      <!-- end gallery -->
      <!-- blog -->
      
      <!-- end blog -->
      <!--  contact -->
      
      <!-- end contact -->
      <!--  footer -->
      @include('home.footer')

      
        
   </body>
</html>