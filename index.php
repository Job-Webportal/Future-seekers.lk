<?php

session_start();

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
  header("location: login.php");
  exit;
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
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
        <i class='bx bx-grid'></i>
        <span class="links_name">Dummy </span>
        </a>
        <span class="tooltip">Dummy</span>
      </li>
      <li>
        <a href="#">
        <i class='bx bx-grid'></i>
          <span class="links_name">Dummy </span>
        </a>
        <span class="tooltip">Dummy</span>
      </li>
      <li>
        <a href="#">
        <i class='bx bx-grid'></i>
          <span class="links_name">Dummy </span>
        </a>
        <span class="tooltip">Dummy</span>
      </li>
      <li>
        <a href="#">
        <i class='bx bx-grid'></i>
          <span class="links_name">Dummy </span>
        </a>
        <span class="tooltip">Dummy</span>
      </li>
    </ul>
    <div>
      <i class="bx bx-log-out" id="log_out"></i>
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
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</html>


