<?php
    session_start();

    // Check if the user is logged in, if not then redirect him to login page
    if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
    }

    if ($_SESSION["verified"] == '0') {
      echo '<div class="shield d-flex align-items-center">
              <p>  our admin will let you in soon</p>
            </div>';
    }

    require_once 'config.php';
    require_once 'emp-profile.php';
    require_once 'delete-prof.php';

    $email = $_SESSION["name"];

    $user_array = array();

    $sql = "SELECT * FROM employers WHERE email='$email'";
    $results = mysqli_query($db_server, $sql);
  
      if (mysqli_num_rows($results) == 1){

        while($row = mysqli_fetch_assoc($results))
        {
          $user_array[] = $row;
        }
        return $user_array;
      }

?>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Name Profile</title>
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="./libraries/font-awesome/css/font-awesome.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="./libraries/dropify/css/dropify.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/CSS2.css">
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
        </ul>
        <div>
        <i class="bx bx-log-out" id="log_out"></i>
        </div>
    </div>
    <!-- Header -->
    <div class="row admin-header navbar">
        <div class="col-12 d-flex justify-content-center">
            <h5>FutureSeekers</h5>
        </div>
    </div>
    <?php 
      foreach ($user_array as $data){ 
    ?>
    <div class="container-fluid home-content">
        
        <div class="row clearfix">
            <div class="col-md-12">
                <div class="card com-hero">
                    <img src="" alt="">
                </div>
            </div>
            <div class="col-md-12">
                <div class="card prof-card">
                    <div class="d-flex justify-content-between justify-content-center">
                        <div class="d-flex">
                            <div class="prof-pic">
                                <img src="images/Employer_login.png" class="rounded" alt="">
                            </div>
                            <div class="details">
                                <h5><?php echo $company_name ?></h5>
                                <span class="text-light">--Type of Company--</span>
                                <p><?php echo $_SESSION['name'] ?></p>
                            </div>                                
                        </div>
                        <div class="utilities">
                            <div class="d-flex flex-column align-items-center text-center">
                                <i class='bx bxs-pencil' type="button" data-bs-toggle="modal" data-bs-target="#editProfile"></i>
                                <i class='bx bxs-trash' type="button" data-bs-toggle="modal" data-bs-target="#deleteProfile"></i>                            
                            </div>
                        </div>
                    </div>
                </div>                    
            </div>               
        </div>
        <!-- Company Portfolio -->
        <div class="row row-cols-1 row-cols-md-2 g-4">
            <div class="col-md-8">
                <div class="card portfolio">
                    <div class="card-body">
                        <h5 class="card-title">Company Portfolio</h5>
                        <div class="row com-desc">
                            <textarea name="description" id="description" cols="20" rows="5" readonly></textarea>
                        </div>
                        <div class="row">
                            <div class="col">
                                <h4>Type of Employment</h4>
                                <p>Remote</p>
                            </div>
                            <div class="col">
                                <h4>Company Size</h4>
                                <p>100 - 1200</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <h4>Headquarters</h4>
                                <p>Trent Bridge</p>
                            </div>
                            <div class="col">
                                <h4>Founded</h4>
                                <p>1992</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <h4>Vision</h4>
                                <p>To Wash Car</p>
                            </div>
                            <div class="col">
                                <h4>Mission</h4>
                                <p>To Clean Tires</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- HR Admin Card -->
            <div class="col-md-4 mb-3">
              <div class="card">
                <div class="card-body">
                <h5 class="card-title">HR Personnel</h5>
                  <div class="d-flex flex-column align-items-center text-center hr-picture">
                    <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin" class="rounded-circle">
                    <div class="mt-3">
                      <h4>John Doe</h4>
                      <p class="text-secondary mb-1">Senior HR Director</p>
                      <p class="text-primary mb-1"></p>
                      <button class="btn btn-primary">Follow</button>
                      <button class="btn btn-outline-primary">Message</button>
                    </div>

                  </div>
                </div>
            </div>
        </div>
        <!--  -->
        <?php } ?>
    </div>
    <!-- Edit Profile Modal -->
    <div class="modal fade" id="editProfile" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editProfileLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-body">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="edit-form-emp">
              <div class="main-info">
                <h4>Basic Profile Information</h4>
                <form action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method = "POST" enctype="multipart/form-data" autocomplete="off" novalidate="">
                <div class="row justify-content-between">
                  <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label ">Company Name</label> <input type="text" id="edit-name" name="edit-name" > </div>
                  <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label ">Email</label> <input type="text" id="edit-email" name="edit-email" > </div>
                  <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label ">Contact No.</label> <input type="text" id="edit-tel" name="edit-tel" > </div>
                  <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label ">Type of Business</label>     <select id="edit-type-business" name='edit-type-business'>
                            <option value="None">Select Industry</option>
                            <option id="default1" value="Aerospace Industry">Aerospace Industry</option>
                            <option value="Computer Industry">Computer Industry</option>
                            <option value="Telecommunication industry">Telecommunication industry</option>
                            <option value="Agriculture industry">Agriculture industry</option>
                            <option value="Construction Industry">Construction Industry</option>
                            <option value="Pharmaceutical Industry">Pharmaceutical Industry</option>
                            <option value="Education Industry">Education Industry</option>
                            <option value="Food Industry">Food Industry</option>
                            <option value="Health care Industry">Health care Industry</option>
                            <option value="Hospitality Industry">Hospitality Industry</option>
                            <option value="News Media Industry">News Media Industry</option>
                            <option value="Energy Industry">Energy Industry</option>
                            <option value="Manufacturing Industry">Manufacturing Industry</option>
                            <option value="Music Industry">Music Industry</option>
                            <option value="Mining Industry">Mining Industry</option>
                            <option value="Worldwide Web">Worldwide Web</option>
                            <option value="Electronics Industry">Electronics Industry</option>
                            </select>
                  </div> 
                  <!-- option -->
                </div>
                <br>

                <div class="prof-upload">
                  <div class="">
                      <h2>Upload Company Logo</h2>
                  </div>
                  <div class="drop">
                      <input type="file" name="prof-logo" class="dropify" data-max-file-size="300K">
                  </div>
                </div>
                <br>
                <div class="cover-upload">
                  <div class="">
                      <h2>Upload a Cover Image</h2>
                  </div>
                  <div class="drop">
                      <input type="file" name="cover-picture" class="dropify" data-max-file-size="2000K">
                  </div>
                </div>
              </div>
              <h4>Company Information</h4>
              <div class="com-info">
                <div class="form-group col-sm-12 flex-column d-flex"> 
                  <label class="form-control-label ">Company Description</label>
                  <textarea name="edit-desc" id="edit-desc" cols="60" rows="5"></textarea>
                </div>
                <div class="row justify-content-between">
                  <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label ">Type of Employment</label> <input type="text" id="edit-employ" name="edit-employ" > </div>
                  <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label ">Company Size</label> <input type="text" id="edit-size" name="edit-size" > </div>
                  <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label ">Headquarters</label> <input type="text" id="edit-head" name="edit-head" > </div>
                  <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label ">Founded</label> <input type="text" id="edit-founded" name="edit-founded" > </div>
                </div>
                <div class="row"> <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label ">Mission</label> <input type="text" id="edit-mission" name="edit-mission" > </div></div>
                <div class="row"> <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label ">Vision</label> <input type="text" id="edit-vision" name="edit-vision" > </div></div>
              </div>
              <h4>HR Admin Information</h4>
              <div class="hr-admin-info">
                <div class="row justify-content-between">
                  <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label ">First Name</label> <input type="text" id="edit-hr-fname" name="edit-hr-fname" > </div>
                  <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label ">Last Name</label> <input type="text" id="edit-hr-lname" name="edit-hr-lname" > </div>
                  <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label ">Email</label> <input type="text" id="edit-hrmail" name="edit-hrmail" > </div>
                  <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label ">Position</label> <input type="text" id="edit-hrposition" name="edit-hrposition" > </div>
                </div>
                <div class="row">
                  <div class="prof-upload">
                    <div class="">
                        <h2>Upload HR Admin Profile</h2>
                    </div>
                    <div class="drop">
                        <input type="file" name="prof-hr-pic" class="dropify" data-max-file-size="300K">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-secondary" data-bs-dismiss="modal">Save Changes</button>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          </div>
          </form>
        </div>
      </div>
    </div>

    <!-- Delete Profile Modal -->
    <div class="modal fade" id="deleteProfile" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="deleteProfileLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">          
            <div class="modal-body">
            <div class="d-flex flex-column align-items-center text-center">
              <h3>All your Progress on this Site will be Deleted</h3>
              <form action="">

              </form>
              <img src="" alt="" height="78px">
              <h5>Do you wanna Delete the profile</h5>
              <button type="button" class="btn btn-primary" data-bs-dismiss="modal">no</button>
              <a href="delete-prof.php"> <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Yes</button></a>
            </div>
          </div>
        </div>
      </div>
    </div>

</body>

    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="./libraries/dropify/js/dropify.min.js"></script>

    <script type="text/javascript">
      $(document).ready(function(){
        $('.dropify').dropify();
      });

      let btn = document.querySelector('#sideBtn');
      let sidebar = document.querySelector('.sidebar');

      btn.onclick = function() {
          sidebar.classList.toggle("active");
      }

    </script>
</html>