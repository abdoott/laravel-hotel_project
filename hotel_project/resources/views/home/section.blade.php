<style>
   .carousel-item {
  position: relative;
}

.overlay {
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: rgba(0, 0, 0, 0.3);
  display: flex;
  justify-content: center;
  align-items: center;
}

.text-content {
  text-align: center;
}

.subheading {
  font-family: Arial, sans-serif;
  font-size: 18px;
  text-transform: uppercase;
  color: white;
  margin-bottom: 20px;
  letter-spacing: 2px;
}

.main-heading {
  font-family: 'Times New Roman', serif;
  font-size: 72px;
  font-weight: bold;
  color: white;
  margin: 0;
}

.carousel-item img {
  width: 100%;
  height: 100vh;
  object-fit: cover;
}
</style>
<div id="myCarousel" class="carousel slide banner" data-ride="carousel">
   <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
   </ol>
   <div class="carousel-inner">
      <div class="carousel-item active">
         <img class="first-slide" src="images/banner1.jpg" alt="First slide">
         <div class="overlay">
            <div class="text-content">
               <h2 class="subheading">MORE THAN A HOTEL... AN EXPERIENCE</h2>
               <h1 class="main-heading">Welcome To KETO</h1>
            </div>
         </div>
      </div>
      <div class="carousel-item">
         <img class="second-slide" src="images/banner2.jpg" alt="Second slide">
         <div class="overlay">
            <div class="text-content">
               <h2 class="subheading">ENJOY YOUR WONDERFUL HOLIDAYS WITH A GREAT LUXURY EXPERIENCE!</h2>
               <h1 class="main-heading">Most Relaxing Place</h1>
            </div>
         </div>
      </div>
      <div class="carousel-item">
         <img class="third-slide" src="images/banner3.jpg" alt="Third slide">
         <div class="overlay">
            <div class="text-content">
               <h2 class="subheading">ENJOY YOUR WONDERFUL HOLIDAYS WITH A GREAT LUXURY EXPERIENCE!</h2>
               <h1 class="main-heading">Most Relaxing Place</h1>
            </div>
         </div>
      </div>
   </div>
   <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
   <span class="carousel-control-prev-icon" aria-hidden="true"></span>
   <span class="sr-only">Previous</span>
   </a>
   <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
   <span class="carousel-control-next-icon" aria-hidden="true"></span>
   <span class="sr-only">Next</span>
   </a>
</div>