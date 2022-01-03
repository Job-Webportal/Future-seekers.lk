<?php

session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <!-- <link rel="stylesheet" href="./libraries/font-awesome/css/font-awesome.css"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/CSS3.css">
    <title>FutureSeekers - Welcome</title>
</head>
<body>
  <div class="sidebar">
    <div class="logo_content">
      <div class="logo">
      <i class='bx bxl-yelp'></i>
      <div class="logo_name">FutureSeekers</div>
      </div>
      <i class="bx bx-menu" id="sideBtn"></i>
    </div>
    <ul class="nav_list">
      <li>
        <a href="index.php">
        <i class='bx bx-home'></i>
        <span class="links_name">Home</span>
        </a>
      </li>
      <li>
        <a href="jobs.php">
        <i class='bx bx-briefcase'></i>
        <span class="links_name">Jobs</span>
        </a>
      </li>
      <li>
        <a href="#">
        <i class='bx bx-info-circle'></i>
        <span class="links_name">About Us</span>
        </a>
      </li>
      <li>
        <a href="#">
        <i class='bx bxs-user-account'></i>
        <span class="links_name">Contact Us</span>
        </a>
      </li>
      <li>
        <a href="login.php">
        <i class='bx bx-log-in'></i>
        <span class="links_name">Login</span>
        </a>
      </li>
      <li>
        <a href="registration.php">
        <i class='bx bxs-user-check'></i>
        <span class="links_name">Sign Up</span>
        </a>
      </li>
      <li id="log_out">
        <a href="logout.php">
          <i class="bx bx-log-out"></i>
          <span class="links_name">Sign Out</span>
        </a>
      </li>

    </ul>
  </div>
    <!-- Header -->
    <div class="flex-row d-flex justify-content-between align-items-center navbar-home">
      <div class="">

      </div>
      <div class="title d-flex flex-row">
        <i class='bx bxl-yelp'></i>
        <h4 class="mb-0">FutureSeekers</h4>
      </div>
      <div class="sm-image">

        <a type="button" href="<?php 

          $tool = "View Profile";
          if(!isset($_SESSION["type"])){
              echo "#";
              $tool = "Please Sign-in to gain access";
          } elseif($_SESSION["type"] === "Applicant") {
            echo "applicant.php";
          } elseif($_SESSION["type"] === "Employer") {
            echo "employer.php";
          } else{
            echo "admin.php";
          }

        ?>"><i class='bx bxs-user-circle' data-bs-toggle="tooltip" data-bs-placement="left" title="<?php echo $tool; ?>"></i> </a>
      </div>
    </div>

    <div class="container-fluid home-content">
      
      <!-- HEADER HERO -->
      <section class="hero-4 position-relative overflow-hidden align-items-center d-flex" id="home" style="background-image: url(images/hero-4-bg.png);">
            <div class="container-fluid mr-6">
                <div class="row justify-content-between align-items-center">
                    <div class="col-lg-5 col-md-5">
                        <div class="hero-content mb-lg-0 mb-5 pb-lg-0 pb-5">
                            <div class="hero-icon bg-soft-light rounded-circle mb-4">
                                <i class="bx bx-arch text-light font-size-24"></i>
                            </div>
                            <h1 class="text-light font-weight-normal mb-1">Find Your</h1>
                            <h1 class="text-light font-weight-normal mb-4">Place Of Dream</h1>
                            <p class="hero-4-sub-title mb-4 pb-2">We are trusted for experts in nation wide <span><b>Recruitment Services</b></span>. It is a long established fact that a reader will be distracted by the readable content.</p>
                            <a href="registration.php" class="btn btn-block">Join Us</a>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-7 d-flex justify-content-end">
                        <img class="hero-img" src="images/Teamwork.png" alt="" />
                    </div>
                </div>
            </div>
        </section>
        <!-- Features -->
        <section class="services" id="services">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="text-center mb-5">
                            <h3 class="font-weight-medium mb-3">What we Offer!!</h3>
                            <p class="text-muted">Donec nec nibh vestibulum, fringilla ante nec, convallis turpis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut rhoncus tristique nibh.</p>
                        </div>
                    </div>
                    <!-- end-col -->
                </div>
                <!-- end row -->
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="card text-center hover-effect mb-4">
                            <div class="card-body px-4 py-5">
                                <img class="img-fluid mb-4 pb-2" src="images/feat-1.gif" alt="" />
                                <h5 class="font-weight-medium font-size-18 mb-3">Apply for Jobs</h5>
                                <p class="text-muted mb-3">Curabitu pellentesque Quisque agtut nulltatnunc aboutit. </p>
                                <a href="jobs.php">Learn More<i class="bx bx-right-arrow-alt align-middle font-size-18 icon ml-1"></i></a>
                            </div>
                        </div>
                    </div>
                    <!-- end col -->
                    <div class="col-lg-4 col-md-6">
                        <div class="card text-center hover-effect active mb-4">
                            <div class="card-body px-4 py-5 p-0">
                                <img class="img-fluid mb-4 pb-2" src="images/feat-2.gif" alt="" />
                                <h5 class="font-weight-medium font-size-18 mb-3">Explore our Job Market</h5>
                                <p class="text-muted mb-3">Curabitu pellentesque Quisque agtut nulltatnunc aboutit.</p>
                                <a href="jobs.php">Learn More<i class="bx bx-right-arrow-alt align-middle font-size-18 icon ml-1"></i></a>
                            </div>
                        </div>
                    </div>
                    <!-- end col -->
                    <div class="col-lg-4 col-md-6">
                        <div class="card text-center hover-effect mb-4">
                            <div class="card-body px-4 py-5 p-0">
                                <img class="img-fluid mb-4 pb-2" src="images/feat-3.gif" alt="" />
                                <h5 class="font-weight-medium font-size-18 mb-3">24x7 Customer Support</h5>
                                <p class="text-muted mb-3">Curabitu pellentesque Quisque agtut nulltatnunc aboutit.</p>
                                <a href="contact.php">Learn More<i class="bx bx-right-arrow-alt align-middle font-size-18 icon ml-1"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End of Features -->
    </div> <!-- end of content -->

</body>

    <!-- Additional Javascrpit Libiraries  -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
     <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
     <script>
  let btn = document.querySelector('#sideBtn');
  let sidebar = document.querySelector('.sidebar');

  btn.onclick = function() {
    sidebar.classList.toggle("active");
  }

  let tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
  let tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
    return new bootstrap.Tooltip(tooltipTriggerEl)
  })
</script>
     </html>
<!-- log-out <i class='bx bx-log-out'></i> -->
<!--  -->
