<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script><script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


<?php 
   
  require_once 'config.php';
  session_start();

  $adArray = array();
  
  $sql = "SELECT `City` FROM `adverts`";
  $results = mysqli_query($db_server, $sql);

  while($row = mysqli_fetch_assoc($results))
  {
      $adArray[] = $row;
  }

?>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/CSS1.css">
    <title>FutureSeekers - Explore</title>
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
        <p class="up"></p>
      </div>
    </div>
    
    <div class="container-fluid home-content">
      <!-- Header -->
        <section class="job_header">
          <div class="row">
            <div class="col-md-12">
              <h2 class="text-center">get your dream job</h2>
            </div>
          </div>
          <div class="row ">
            <div class="col-md-6">
            <img src="images/hero-2.png" alt="">
            </div>
            <div class="col-md-6 d-flex justify-content-end">
              <img class="img-hor-vert" src="images/hero-2.png" alt="">
            </div>
          </div>
        </section>
        
        <!-- Job Search -->
        <section class="search">
          <div class="row d-flex justify-content-center align-items-center searchBar">
            <div class="col-md-8">
              <form action="" class="">
                <div class="input-group mb-3">
                    <input type="text" id="search" class="form-control" placeholder="   Search Here..." >
                    <button type="button" class="input-group-text btn-orange"><i class="bx bx-search-alt"></i></button>
                </div>
              </form>
            </div>
            <div class="col-md-1 mb-3">
              <span class="filter"><i type="button" class='bx bx-filter-alt rounded-circle' data-bs-toggle="collapse" data-bs-target="#filter"></i></span>
            </div>            
          </div>
          <!-- Filter Menu -->
          <div id="filter" class="row collapse" name="sort">
            <form action="" method="post">
              <div class="row d-flex justify-content-center filterMain">
                <h5 class="sortHead">Apply Filters:</h5>
                <div class="col-md-2 salary">
                  <h4>Salary Estimate</h4>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="salary" id="salary salary1"  value="10000">
                      <label class="form-check-label" for="salary1">
                        LKR 10,000+
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input " type="radio" name="salary" id="salary salary2" value="45000">
                      <label class="form-check-label" for="salary2">
                        LKR 45,000+
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="salary" id="salary salary3" value="75000">
                      <label class="form-check-label" for="salary3">
                        LKR 75,000+
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="salary" id="salary salary4" value="130000">
                      <label class="form-check-label" for="salary4">
                        LKR 130,000+
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="salary" id="salary salary5" value="300000">
                      <label class="form-check-label" for="salary5">
                        LKR 300,000+
                      </label>
                    </div>
                </div>
                <div class="col-md-3">
                  <h4>Category</h4>
                  <div class="form-button">
                      <select class="rounded" id="category" name="category" style="width: 90%;" onchange="searchFilter();">
                          <option value="">Category</option>
                          <option value="Architecture and Engineering">Architecture and Engineering</option>
                          <option value="Art and Entertainment">Art and Entertainment</option>
                          <option value="Business management and administration">Business management and administration</option>
                          <option value="Communications">Communications</option>
                          <option value="Information Technology">Information Technology</option>
                          <option value="Community and Social services">Community and Social services</option>
                          <option value="Education">Education</option>
                          <option value="Science and technology">Science and technology</option>
                          <option value="Installation and maintenance">Installation and maintenance</option>
                          <option value="Government">Government</option>
                          <option value="Farming and forestry">Farming and forestry</option>
                          <option value="Sales and Marketing">Sales and Marketing</option>
                          <option value="Law and public policy">Law and public policy</option>
                      </select>
                  </div>
                </div>
                <div class="col-md-2">
                  <h4>Level of Experience</h4>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="Experience" id="exp exp1" value="Internship">
                    <label class="form-check-label" for="exp1">
                      Internship
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="Experience" id="exp exp2" value="Entry Level">
                    <label class="form-check-label" for="exp2">
                      Entry-level
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="Experience" id="exp exp3" value="Mid Level">
                    <label class="form-check-label" for="exp3">
                      Mid-level
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="Experience" id="exp exp4" value="Senior Level">
                    <label class="form-check-label" for="exp4">
                      Senior-level
                    </label>
                  </div>
                </div>
                <div class="col-md-2">
                  <h4>Education</h4>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="education" id="edu du1" value="Basic Diploma">
                    <label class="form-check-label" for="edu1">
                      Basic Diploma
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="education" id="edu edu2" value="Bachelor degree">
                    <label class="form-check-label" for="edu2">
                      Bachelor's degree
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="education" id="edu edu3" value="Master degree">
                    <label class="form-check-label" for="edu3">
                      Master's degree
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="education" id="edu edu4" value="Doctoral degree">
                    <label class="form-check-label" for="edu4">
                      Doctoral degree
                    </label>
                  </div>
                </div>
                <div class="col-md-2">
                  <h4>Type of Employment</h4>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="type" id="emp type1" value="Full Time">
                    <label class="form-check-label" for="type1">
                      Full-Time
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="type" id="emp type2" value="Part Time">
                    <label class="form-check-label" for="type2">
                      Part-Time
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="type" id="emp type3" value="Contract">
                    <label class="form-check-label" for="type3">
                      Contract
                    </label>
                  </div>
                </div>
              </div>
              <div class="row d-flex justify-content-center align-items-center">
                <h5 class="sortHead">Job Location:</h5>
                  <div class="col-md-4">
                    <h4>Province</h4>
                    <div class="form-button">
                      <select class="nice-select rounded" id="prov" name="province" onchange="searchFilter();">
                          <option value="">Any</option>
                          <option value="Central Province">Central Province</option>
                          <option value="Eastern Province">Eastern Province</option>
                          <option value="Northern Province">Northern Province</option>
                          <option value="Southern Province">Southern Province</option>
                          <option value="Uva Province">Uva Province</option>
                          <option value="Western Province">Western Province</option>
                          <option value="Sabaragamuwa Province">Sabaragamuwa Province</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <h4>City</h4>
                    <div class="form-button">
                      <select class="nice-select rounded" id="City" name="city" onchange="searchFilter();">
                          <option value="">Any</option>
                          <?php  
                            foreach ($adArray as $data){   
                              echo '<option value = "'.$data["City"].'">';
                              echo $data["City"];
                              echo '</option>';
                            }
                          ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <h4>Type</h4>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="location" id="locate locate1" value="On-site">
                      <label class="form-check-label" for="locate1">
                        On-site
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="location" id="locate locate2" value="Remote">
                      <label class="form-check-label" for="locate2">
                        Remote
                      </label>
                    </div>  
                  </div>
              </div>
              <div class="row d-flex justify-content-end">
                <div class="col-md-1">
                  <button id="remove" class="btn btn-primary" type="button">Remove Filter</button>
                </div>
              </div>
            </form>
          </div>
        </section>
        <section id="jobs" class="jobs">
          
        </section>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<script>
  let salary1 = exp1 = edu1 = type1 = locate1 = "";
  let btn = document.querySelector('#sideBtn');
  let sidebar = document.querySelector('.sidebar');

  btn.onclick = function() {
    sidebar.classList.toggle("active");

  }


  $(document).ready(function(){
    let action;
    $.ajax({ 
        type: 'POST',
        url: "search.php",
        data:{action:action},
        success: function(data){
          $("#jobs").html(data);
        }
      });
  });

  $(document).ready(function(){
    $("#search").keyup(function(){
      event.preventDefault();
      let keywords = $('#search').val();
      let action = 'search';
      $.ajax({
        type:'POST',
        url:'search.php',
        data:{action:action, keywords:keywords},
        success:function(data){
          $("#jobs").html(data);
        }
      });
    });
  });

  function searchFilter(salary1, exp1, edu1, type1, locate1) {
    // page_num = page_num?page_num:0;
    let keywords = $('#search').val();
    let action = 'sort';
    let salary = salary1;
    let category = $("#category").val();
    let exp = exp1;
    let edu = edu1;
    let emp = type1;
    let locate = locate1;
    let City = $('#City').val();
    let prov = $('#prov').val();
    $.ajax({
        type: 'POST',
        url: 'search.php',
        data: '&action='+action+'&keywords='+keywords+'&exp='+exp1+'&salary='+salary1+'&category='+category+'&edu='+edu1+'&emp='+type1+'&locate='+locate1+'&City='+City+'&prov='+prov,
        success: function (html) {
            $('#jobs').html(html);
        }
    });
  }

  // event listener for salary
  if (document.querySelector('input[name="salary"]')) {
    document.querySelectorAll('input[name="salary"]').forEach((elem) => {
      elem.addEventListener("click", function(event) {
        let salary1 = this.value;
        searchFilter(salary1, exp1, edu1, type1, locate1);
      });
    });
  }

  if (document.querySelector('input[name="Experience"]')) {
    document.querySelectorAll('input[name="Experience"]').forEach((elem) => {
      elem.addEventListener("click", function(event) {
        let exp1 = this.value;
        searchFilter(salary1, exp1, edu1, type1, locate1);
      });
    });
  }

  if (document.querySelector('input[name="education"]')) {
    document.querySelectorAll('input[name="education"]').forEach((elem) => {
      elem.addEventListener("click", function(event) {
        let edu1 = this.value;
        searchFilter(salary1, exp1, edu1, type1, locate1);
      });
    });
  }

  if (document.querySelector('input[name="type"]')) {
    document.querySelectorAll('input[name="type"]').forEach((elem) => {
      elem.addEventListener("click", function(event) {
        let type1 = this.value;
        searchFilter(salary1, exp1, edu1, type1, locate1);
      });
    });
  }

  if (document.querySelector('input[name="location"]')) {
    document.querySelectorAll('input[name="location"]').forEach((elem) => {
      elem.addEventListener("click", function(event) {
        let locate1 = this.value;
        searchFilter(salary1, exp1, edu1, type1, locate1);
      });
    });
  }

</script>

</html>