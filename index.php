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
    <title>Home Page</title>
</head>
<body>
  <div id="sidebar-bg" class="sidebar">
    <div class="logo_content">
      <div class="logo">
        <i class='bx bxl-c-plus-plus'></i>
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
    <div class="flex-row d-flex justify-content-between navbar">
      <div class="">

      </div>
      <div class="title align-items-center">
        <h5 class="mb-0">FutureSeekers</h5>
      </div>
      <div class="sm-image">

        <a type="button" href="<?php 
          if(!isset($_SESSION["type"])){
              echo "#";
          } elseif($_SESSION["type"] === "Applicant") {
            echo "applicant.php";
          } elseif($_SESSION["type"] === "Employer") {
            echo "employer.php";
          } else{
            echo "admin.php";
          }

        ?>"><i class='bx bxs-user-circle' data-bs-toggle="tooltip" data-bs-placement="left" title="View Profile"></i></a>
      </div>
    </div>
    <div class="container-fluid home-content">
      <div id="header-holder">
        <div class="row rtl-row">
            <div class="col-sm-5">
                <div class="img-holder">
                    <img src="images/slide-img1.png" alt="">
                </div>
            </div>
            <div class="col-sm-7">
                <div class="b-text head-text">Outstanding Recruitment services for you.</div>
                <div class="m-text head-text">Grow your career with us</div>
            </div>
        </div>
      </div>
      <!-- Features -->
      <div class="features container-fluid">
      <div class="container">
          <div class="row rtl-row">
              <div class="col-sm-5">
                  <div class="img-holder">
                      <img src="images/feature1.png" alt="">
                  </div>
              </div>
              <div class="col-sm-7">
                  <div class="feature-info">
                      <div class="feature-title">Hosting For Every Website</div>
                      <div class="feature-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas posuere euismod dui eget ultrices. Cras condimentum dui eget erat commodo, in venenatis eros blandit.</div>
                      <div class="feature-link"><a href="#" class="hbtn hbtn-default">Get Started!</a></div>
                  </div>
              </div>
          </div>
          <div class="row">
              <div class="col-sm-5">
                  <div class="img-holder">
                      <img src="images/feature2.png" alt="">
                  </div>
              </div>
              <div class="col-sm-7 def-aligned">
                  <div class="feature-info">
                      <div class="feature-title">In a hurry? let’s start!</div>
                      <div class="feature-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas posuere euismod dui eget ultrices. Cras condimentum dui eget erat commodo, in venenatis eros blandit.</div>
                      <div class="feature-link"><a href="#" class="hbtn hbtn-default">Get Started!</a></div>
                  </div>
              </div>
          </div>
          <div class="row rtl-row">
              <div class="col-sm-5">
                  <div class="img-holder">
                      <img src="images/feature3.png" alt="">
                  </div>
              </div>
              <div class="col-sm-7">
                  <div class="feature-info">
                      <div class="feature-title">Grow with us</div>
                      <div class="feature-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas posuere euismod dui eget ultrices. Cras condimentum dui eget erat commodo, in venenatis eros blandit.</div>
                      <div class="feature-link"><a href="#" class="hbtn hbtn-default">Get Started!</a></div>
                  </div>
              </div>
          </div>
      </div>
</div>

    </div>
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
