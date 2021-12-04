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
    <link rel="stylesheet" href="./libraries/font-awesome/css/font-awesome.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/CSS3.css">
    <title>Home Page</title>
</head>
<body>
  <div class="sidebar">
    <div class="logo_content">
      <div class="logo">
        <i class='bx bxl-c-plus-plus'></i>
        <div class="logo_name">FutureSeekers</div>
      </div>
      <i class="bx bx-menu" id="sideBtn"></i>
    </div>
    <ul class="nav_list">
      <li>
        <a href="#">
        <i class='bx bx-home'></i>
        <span class="links_name">Home</span>
        </a>
      </li>
      <li>
        <a href="#">
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
      <li id="log_out">
        <a href="logout.php">
          <i class="bx bx-log-out"></i>
          <span class="links_name">Sign Out</span>
        </a>
      </li>

    </ul>
  </div>
    <!-- Header -->
    <div class="flex-row d-flex justify-content-between admin-header navbar">
      <div class="">

      </div>
      <div class="title align-items-center">
        <h5>FutureSeekers</h5>
      </div>
      <div class="sm-image">
        <a href="<?php 
        
        if (!isset($_SESSION["name"])) {
          echo "test.htm";
        } else {
          if ($_SESSION["type"] === "Employer") {
              echo "employer.php";
          } elseif($_SESSION["type"] === "Applicant") {
              echo "applicant.php";
          } else {
              echo "admin.php";
          }
        }
        
        ?>"><img src="" alt="hi"></a>
      </div>
    </div>
  <div class="container-fluid home-content">
    <div class="row justify-content-between intro">
      <div class="col-4 intro-title">
        <h6>The Future of your Career. All in one Placex</h6>
      </div>
      <div class="col-8 intro-image">
        <img src="images/homebg.png" alt="">
      </div>
    </div>
  </div>
</body>
<script>
  let btn = document.querySelector('#sideBtn');
  let sidebar = document.querySelector('.sidebar');

  btn.onclick = function() {
    sidebar.classList.toggle("active");
  }

</script>
    <!-- Additional Javascrpit Libiraries  -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
</html>
<!-- log-out <i class='bx bx-log-out'></i> -->
<!--  -->
