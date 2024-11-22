<?php
session_start();
require_once("includes/tools.php");
//include header
$title="Russel Street Medical";
require_once("includes/header.php");
?>

<!-- Header -->
<header class="header">
    <div class="container">
      <div id="branding">
        <!-- Added a logo image as placeholder, update the src accordingly -->
        <img src="includes/img/logo.png" alt="City Health Hub Logo" class="logo">
        <h1>City Health Hub</h1>
      </div>
      <nav class="sticky-nav">
        <a href="#about">About Us</a>
        <a href="#staff">Who We Are</a>
        <a href="#services">Service Area</a>
        <a href="booking.php">Book an Appointment</a>
        <a href="administration.php">Administration</a>
      </nav>
    </div>
</header>
  <!-- Main Content -->

  <section id="about" class="about-section">
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="https://www.thewomens.org.au/assets/images/hero/Egg_and_sperm_press_conference_homepage_banner_desktop.png" class="d-block w-100" alt="Image 1">
            </div>
            <div class="carousel-item">
                <img src="https://www.mymedicaldepartment.com/wp-content/uploads/mmd-bg-image-blobs.jpg" class="d-block w-100" alt="Image 2">
            </div>
            <div class="carousel-item">
                <img src="https://e0.pxfuel.com/wallpapers/293/224/desktop-wallpaper-medical-biology-detail-medicine-psychedelic-science-abstract-abstraction-chemistry-genetics-emergency-medicine.jpg" class="d-block w-100" alt="Image 3">
            </div>
            <div class="carousel-item">
                <img src="https://pbs.twimg.com/media/E6Dp2drVIAEK5d0.jpg:large" class="d-block w-100" alt="Image 3">
            </div>
            <div class="carousel-item">
                <img src="https://www.rmit.edu.au/content/dam/rmit/rmit-images/college-of-seh-images/marketing-images/image-galleries/nursing-gallery/RMIT_SVHS_june2015_0217-1440x865.jpg" class="d-block w-100" alt="Image 3">
            </div>
            <!-- Add more items as needed -->
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>

        <div class="overlay-content">
            <h2>About Us</h2>
            <p>Russel Street Medical opened in 2020 and is located in Melbourne’s CBD at 427 Swanston Street
                Melbourne 3000, just opposite RMIT University Building 10 and within walking distance of Melbourne
                central station.</p>
            <p>We strive to help all our patients with a focus on preventative health care, a view to managing chronic
                health conditions with a holistic approach, and with access to a wide range of specialist care providers
                when needed.</p>
        </div>
    </div>
</section>  



  <main>
    
    <!-- Who We Are Section -->
    <section id="staff" class="staff-section">
        <div class="container">

        
        <h2>Who We Are</h2>
        <div class="row">
            <!-- Adjusted image size with class "staff-image" -->
            <div class="col">
                <h3>Dr. Stephen Hill</h3>
                <img src="includes/img/male.webp" alt="Dr. Stephen Hill" class="staff-image">
                <p>Stephen Hill graduated from Auckland University in New Zealand in 2014 and obtained his Fellowship from the Royal Australian College of General Practitioners in 2017.</p>
            </div>
            <div class="col">
                <h3>Ms. Kiyoko Tsu</h3>
                <img src="includes/img/female.webp" alt="Ms. Kiyoko Tsu" class="staff-image">
                <p>Kiyoko Tsu completed her Bachelor of Nursing at the Yong Loo Lin School of Medicine in Singapore in 2019. She is an accredited Nurse Immunizer and has worked in various hospitals within metropolitan Melbourne.</p>
            </div>
        </div>
        </div>
    </section>

    <!-- Service Area Section -->
    <section id="services">
        <div class="container">
        <h2>Service Area</h2>
        <p>We invite new patients to register with us in person and remind current patients that they can use our online booking system to book vaccinations and blood tests.</p>
        </div>
    </section>
</main>
<!-- Footer -->
<?php require_once("includes/footer.php")?>

