<?php 
require_once("include/initialize.php");
 
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Barangay Information System</title>
  <meta name="description" content="">
  <meta name="keywords" content="">


  <!-- Favicons -->
  <link href="main_assets/img/pasay.jpeg" rel="icon">
  <link href="main_assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="main_assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="main_assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="main_assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="main_assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="main_assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="main_assets/css/main1.css" rel="stylesheet">
  
</head>

<body class="index-page">

<header id="header" class="header d-flex align-items-center mb-2" style="border-bottom: 1px solid #f1f0eb;">
  <div class="container-fluid container-xl position-relative d-flex align-items-center">

    <a href="http://localhost/brgy184/main.php" class="logo d-flex align-items-center me-auto" style="color: #ffffff; text-decoration: none;">
      <img src="main_assets/img/pasay.jpeg" alt="Barangay Logo" style="max-height: 80px; margin-right: 10px; width: auto;">
      <div class="sitename" style="line-height: 1.2; text-align: left;">
        <h3 style="font-size: 25px; font-weight: bold; margin: 0; font-family: Arial, sans-serif;">Barangay 184</h3>
        <h3 style="font-size: 20px; font-weight: bold; margin: 0; font-family: Arial, sans-serif;">Pasig City</h3>
      </div>
    </a>

    <!-- Mobile Menu Button -->
    <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>

    <nav id="navmenu" class="navmenu">
      <ul>
        <li><a href="#home" class="active">Home</a></li>
        <li><a href="#about">About</a></li>
        <li><a href="#values">Values</a></li>
        <li><a href="#announcement">Announcement</a></li>
        <li><a href="#location">Location</a></li>
        <li><a href="view/dataprivacy.php">register</a></li>
        <li><a href="login.php">Login</a></li>
      </ul>
    </nav>

  </div>
</header>

<style type="text/css">

/* Mobile toggle button */
.mobile-nav-toggle {
  font-size: 30px;
  cursor: pointer;
  position: absolute;
  right: 15px;
  top: 15px;
  color: #000;
  z-index: 10000;
}

#navmenu {
  font-family: Arial, sans-serif;
}


</style>


  <main class="main">

    <style type="text/css">
      
    </style>

<section id="home"  style="padding: 0; overflow: hidden;">
  <div class="container p-0">
    <div class="row justify-content-center">
      <div class="col-12 text-center">
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel" data-bs-interval="4000">
          <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
          <!--   <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 4"></button> -->
          <!--   <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="4" aria-label="Slide 5"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="5" aria-label="Slide 6"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="6" aria-label="Slide 7"></button> -->
          </div>
          <div class="carousel-inner">
            <!-- <div class="carousel-item active">
              <img src="main_assets/img/website/homepage1.png" class="d-block w-100 img-fluid" alt="Barangay Image 1">
            </div>
            <div class="carousel-item">
              <img src="main_assets/img/website/vision.png" class="d-block w-100 img-fluid" alt="Barangay Image 2">
            </div>
            <div class="carousel-item">
              <img src="main_assets/img/website/officials1.png" class="d-block w-100 img-fluid" alt="Barangay Image 3">
            </div>
            <div class="carousel-item">
              <img src="main_assets/img/website/captain.png" class="d-block w-100 img-fluid" alt="Barangay Image 4">
            </div> -->
            <!-- <div class="carousel-item active">
              <img src="main_assets/img/website/services.png" class="d-block w-100 img-fluid" alt="Barangay Image 5">
            </div> -->
            <div class="carousel-item active">
              <img src="main_assets/img/website/activities.png" class="d-block w-100 img-fluid" alt="Barangay Image 6">
            </div>
            <div class="carousel-item">
              <img src="main_assets/img/website/values.png" class="d-block w-100 img-fluid" alt="Barangay Image 7">
            </div>
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
      </div>
    </div>
  </div>
</section>










<section id="about" class="about section" style="font-family: 'Times New Roman', Times, serif; font-size: 1.1rem; line-height: 1.8;">

  <div class="container" data-aos="fade-up">
    <div class="row gx-0">

    

      <div class="col-lg-6 d-flex align-items-center" data-aos="zoom-out" data-aos-delay="200">
        <img src="main_assets/img/brgyhome.jpg" class="img-fluid" alt="about">
      </div>

        <div class="col-lg-6 d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="200">
        <div class="content">

          <h2 style="font-weight: bold; font-size: 1.5rem;">A Home for Everyone</h2>
          <p>
         Barangay 184 in Pasay City is a densely populated urban barangay officially established in the late 20th century, located in the Maricaban area. Originally part of a larger rural landscape, it has since evolved into a residential and commercial hub. Strategically situated near major thoroughfares such as Taft Avenue and EDSA, and serviced by nearby LRT-1 and MRT-3 stations, the barangay benefits from excellent connectivity. Over the years, Barangay 184 has developed essential public services, including health centers, schools, and community facilities, while maintaining a strong local identity. It continues to adapt to urban challenges and plays a vital role in Pasay's dynamic urban environment.
         <br>
         <br>
            Discover the wide range of services we offer, stay informed on vital updates, and connect with your community—all conveniently available in one platform.
          </p>

          <div class="text-center text-lg-start">
           <!--  <a href="about.html" class="btn-read-more d-inline-flex align-items-center justify-content-center align-self-center">
              <span>Read More</span>
              <i class="bi bi-arrow-right"></i>
            </a> -->
          </div>
        </div>
      </div>

    </div>
  </div>

</section><!-- /About Section -->








    <!-- Values Section -->
    <section id="values" class="values section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Our Values</h2>
        <p>What we value most<br></p>
      </div><!-- End Section Title -->

      <div class="container">

        <div class="row gy-4">

          <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
            <div class="card">
              <img src="main_assets/img/transparency.png" class="img-fluid" alt="">
              <h3>Transparency</h3>
              <p>Committed to transparency by making all barangay processes, financial reports, and decisions open and accessible, fostering trust and empowering our community to thrive.</p>
            </div>
          </div><!-- End Card Item -->

          <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
            <div class="card">
              <img src="main_assets/img/values-1.png" class="img-fluid" alt="">
              <h3>Community Engagement</h3>
              <p>We encourage active community participation and engagement, believing that a collaborative approach strengthens our barangay and fosters a sense of unity among residents..</p>
            </div>
          </div><!-- End Card Item -->

          <div class="col-lg-4" data-aos="fade-up" data-aos-delay="300">
            <div class="card">
              <img src="main_assets/img/values-3.png" class="img-fluid" alt="">
              <h3>Efficiency</h3>
              <p>Our goal is to deliver efficiently by utilizing modern tools and streamlined processes, ensuring that the needs of our community are met promptly and effectively.</p>
            </div>
          </div><!-- End Card Item -->

        </div>

      </div>

<br>

<section id="announcement" class="announcements section py-5">
  <div class="container">
    <div class="row">
      <div class="col-12 text-center mb-4">
        <h5 class="display-5 font-weight-bold" style="font-weight: bolder;">Announcements</h5>
        <p class="lead text-muted">Stay updated with the latest announcements.</p>
      </div>
      <div class="col-12">
        <div class="row">
          <?php
            $mydb->setQuery("SELECT * FROM tblannouncement WHERE status = 'Active' ORDER BY AnnouncementID DESC");
            $announcements = $mydb->loadResultList();
            foreach ($announcements as $announcement) {
              echo '<div class="col-md-4 mb-4">';
              echo '<div class="card shadow-sm border-light" style="background-color: white;">';
              echo '<div class="card-body text-center">';
              echo '<i class="fas fa-bullhorn fa-2x mb-2" style="color: #007bff;"></i>'; // Bullhorn icon
              echo '<p class="card-text text-muted">Date Posted: ' . htmlspecialchars($announcement->DatePosted) . '</p>';
              echo '<hr>'; // Horizontal line
              echo '<h5 class="card-title font-weight-bold formal-font">' . htmlspecialchars($announcement->event) . '</h5>';
              echo '</div>'; // End of card body
              echo '</div>'; // End of card
              echo '</div>'; // End of column
            }
          ?>
        </div>
      </div>
    </div>
  </div>
</section>


<section id="video" class="video section py-5">
  <div class="container">
    <div class="row">
      <div class="col-12 text-center mb-4">
        <h5 class="display-5 font-weight-bold" style="font-weight: bolder">Watch Our Video</h5>
        <p class="lead text-muted">Check out the latest updates in our video.</p>
      </div>
      <div class="col-12">
        <div class="ratio ratio-16x9">
          <iframe src="https://www.youtube.com/embed/IbknRw8L-l4" width="100%" height="100%" style="border:none;overflow:hidden" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
      </div>
    </div>
  </div>
</section>



<style>
  .video {
    background-color: #f8f9fa; /* Light background for video section */
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  }

  .embed-responsive {
    position: relative;
    display: block;
    height: 0;
    padding: 0;
    overflow: hidden;
    padding-bottom: 56.25%; /* 16:9 Aspect Ratio */
  }

  .embed-responsive iframe {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
  }
</style>

<style>
  .announcements {
    background-color: #b3ffb3; /* Light orange background */
    border-radius: 8px;
    padding: 20px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  }

  .card {
    border-radius: 8px;
  }

  .formal-font {
    font-family: 'Georgia', serif; /* Use a serif font for a formal look */
    font-size: 1.25rem; /* Adjust font size as needed */
    color: #343a40; /* Dark color for better readability */
  }

 
</style>

<!-- Include Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

<!-- Google Maps Section -->
<section id="location" class="map section py-5">
  <div class="container">
    <div class="row">
      <div class="col-12 text-center">
        <h4 class="mb-4" style="font-weight: bolder">Find Us on the Map</h4>
      </div>
      <div class="col-12">
        <div class="ratio ratio-16x9">
          <iframe 
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3876.7000000000007!2d121.008000!3d14.573800!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397b706c1a2b123%3A0xabcdef1234567890!2sBarangay%20184%2C%20Pasay%20City!5e0!3m2!1sen!2sph!4v1620000000000!5m2!1sen!2sph" 
            width="600" 
            height="450" 
            style="border:0;" 
            allowfullscreen="" 
            loading="lazy" 
            referrerpolicy="no-referrer-when-downgrade">
          </iframe>
        </div>
      </div>
    </div>
  </div>
</section>



<!-- Include Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

  </main>

 <footer id="footer" class="footer" style="background-color: #fff;"> <!-- Light blue background -->
  <div class="container footer-top">
    <div class="row gy-4">
      <div class="col-lg-4 col-md-6 footer-about">
        <a href="index.html" class="d-flex align-items-center">
          <span class="sitename">Contact Us</span>
        </a>
        <div class="footer-contact pt-3">
          <p>Barangay 184</p>
          <p>Pasay City, 1600 Philippines</p>
          <p class="mt-3"><strong>Phone:</strong> <span>+63 9193118724</span></p>
          <p><strong>Email:</strong> <span>Brgy184@gmail.com</span></p>
        </div>
      </div>

      <div class="col-lg-4 col-md-3 footer-links">
        <h4>Useful Links</h4>
        <ul>
          <li><i class="bi bi-chevron-right"></i> <a href="#home">Home</a></li>
          <li><i class="bi bi-chevron-right"></i> <a href="#about">About Us</a></li>
          <li><i class="bi bi-chevron-right"></i> <a href="#values">Values</a></li>
          <li><i class="bi bi-chevron-right"></i> <a href="#announcement">Announcement</a></li>
          <li><i class="bi bi-chevron-right"></i> <a href="#location">Location</a></li>
        </ul>
      </div>

      <div class="col-lg-4 col-md-12">
          <h4>Follow Us</h4>
          <p>Joined us on Social Media and stay updated</p>
          <div class="social-links d-flex">
          
            <a href="https://web.facebook.com/groups/726218010853705/?_rdc=1&_rdr"><i class="bi bi-facebook"></i></a>
            <br> 
             <p> Local Government of Barangay 184</p>
          
          </div>
        </div>
     
    </div>
  </div>

  <div class="container copyright text-center mt-4">
    <p> ©<strong class="px-1 sitename">2025 Barangay 184, Pasay City.</strong> <span>All Rights Reserved.</span></p>
  </div>
</footer>

<style>
  #footer {
    background-color: #e0f7fa; /* Light blue background */
    padding: 20px 0; /* Add some padding for better spacing */
  }

  .footer-about, .footer-links {
    color: #343a40; /* Dark text color for better readability */
  }

  .footer-links ul {
    list-style: none; /* Remove default list styling */
    padding: 0; /* Remove default padding */
  }

  .footer-links ul li {
    margin-bottom: 10px; /* Space between links */
  }

  .footer-links ul li a {
    color: #007bff; /* Link color */
    text-decoration: none; /* Remove underline */
  }

  .footer-links ul li a:hover {
    text-decoration: underline; /* Underline on hover */
  }
</style>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="main_assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="main_assets/vendor/php-email-form/validate.js"></script>
  <script src="main_assets/vendor/aos/aos.js"></script>
  <script src="main_assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="main_assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="main_assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
  <script src="main_assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="main_assets/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Main JS File -->
  <script src="main_assets/js/main.js"></script>

</body>

</html>