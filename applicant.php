<?php
    session_start();

    // Check if the user is logged in, if not then redirect him to login page
    if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
    }

    if (!isset($_SESSION['verified']) || $_SESSION['verified'] == '0') {
      header("location: waiting.html");
    } elseif($_SESSION['verified'] == '2') {
      header("location: navbar.html");
    }

    require_once 'config.php';
    $email = $_SESSION["name"];
    require_once 'app-profile.php';


    $user_array = array();

    $sql = "SELECT * FROM applicants WHERE email='$email'";
    $results = mysqli_query($db_server, $sql);
  
      if (mysqli_num_rows($results) == 1){

        while($row = mysqli_fetch_assoc($results))
        {
          $user_array[] = $row;
        }

      }
?>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Name Profile</title>
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
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
      <li id="log_out">
        <a href="logout.php">
          <i class="bx bx-log-out"></i>
          <span class="links_name">Sign Out</span>
        </a>
      </li>

    </ul>
  </div>
    <!-- Header -->
    <div class="row admin-header navbar">
        <div class="col-12 d-flex justify-content-center">
            <h5>FutureSeekers</h5>
        </div>
    </div>
    <!-- Main Content -->
    <?php 
      foreach ($user_array as $data){ 
    ?>
    <div class="container-fluid home-content">
        <h5>Profile</h5>
            <div class="row clearfix">
                <div class="col-md-12">
                    <div class="card prof-card">
                        <?php 
                            if(!empty($data["profile_picture"])){
                                    $img = $data["profile_picture"];
                                } else {
                                    $img="static-user.webp";
                                } 
                        ?>
                        <div class="d-flex justify-content-between justify-content-center">
                            <div class="d-flex">
                                <div class="prof-pic">
                                    <img src="pictures/<?php echo $img; ?>" class="rounded" alt="">
                                </div>
                                <div class="details">
                                    <h5><?php echo $data["Firstname"]; ?><?php echo " "; ?><?php echo $data["Lastname"]; ?></h5>
                                    <span class="text-light"><?php if (empty($data["Education"])) { echo "--Education--"; } else { echo $data["Education"]; } ?></span>
                                    <p><?php echo $data["Email"]; ?></p>
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
            <!-- User Information Tab -->
            <div class="row">
                <div class="col-md-8 info-tab">
                    <div class="card app-info-card">
                        <h5 class="card-title">About Me</h5>
                        <textarea name="about-me" id="about-me" cols="20" rows="5" readonly><?php echo $data["About_me"]; ?></textarea>
                        <div class="row">
                            <div class="col">
                                <h3>Contact Number</h3>
                                <p><?php echo $data["Contact_No"]; ?></p>
                            </div>
                            <div class="col">
                                <h3>Graduated at</h3>
                                <p><?php echo $data["Graduated"]; ?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <h3>City</h3>
                                <p><?php echo $data["City"]; ?></p>
                            </div>
                            <div class="col">
                                <h3>Province</h3>
                                <p><?php echo $data["Province"]; ?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 info-tab">
                    <div class="card app-pref-card">
                        <h5 class="card-title">User Prefernces</h5>

                    </div>
                </div>
            </div>
            <?php } ?>
            <!-- Job Table-->
            <div class="row">
                <div class="col-md-4 emp-panel">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Notifications</h5>
                            <div class="row notify-bar">
                                <div class="col-2">
                                    <i class="bx bx-log-out"></i>
                                </div>
                                <div class="col-10 d-flex flex-column">
                                    <h6>FutureSeekers Team</h6>
                                    <p>Welcome to our Portal</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                <div class="container">
                <h5>Job Applications Panel</h5>
                <table class="table table-borderless table-responsive card-1 p-4">
                    <thead>
                        <tr class="border-bottom">
                            <th> <span class="ml-2">Company Name</span> </th>
                            <th> <span class="ml-2">Job Position</span> </th>
                            <th> <span class="ml-2">Date & Time</span> </th>
                            <th> <span class="ml-4">Status</span> </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="border-bottom">
                            <td>
                                    <div class="p-2"> <span class="d-block font-weight-bold">Aston Martin</span></div>
                                </div>
                            </td>
                            <td>
                            <div class="p-2"> <span class="d-block font-weight-bold">Line Manager</span></div>
                            </td>
                            <td>
                                <div class="p-2"> <span class="d-block font-weight-bold">Tomorrow</span> <small>2:30PM</small> </div>
                            </td>
                            <td>
                                <div class="p-2 icons"><span class="badge bg-warning text-dark">Submitted for Review</span></div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
                </div>
            </div>


    </div>
    <?php 
      foreach ($user_array as $data){ 
    ?>
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
                  <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label ">Firstname</label> <input type="text" id="edit-fname" name="edit-fname" value="<?php echo $data["Firstname"]; ?>"> </div>
                  <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label ">Lastname</label> <input type="text" id="edit-lname" name="edit-lname" value="<?php echo $data["Lastname"]; ?>"> </div>
                  <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label ">Email</label> <input type="text" id="app-email" name="app_email" value="<?php echo $data["Email"]; ?>"> </div>
                  <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label ">Contact No.</label> <input type="text" id="edit-contact" name="edit-contact" value="<?php echo $data["Contact_No"]; ?>"> </div>
                </div>
                <div class="row">
                    <div class="prof-upload">
                        <div class="">
                            <h2>Upload a Profile Picture</h2>
                        </div>
                        <div class="drop">
                            <input type="file" name="app_picture" class="dropify" data-max-file-size="300K">
                        </div>
                    </div>
                </div>

              </div>
              <div class="app-info">
                <div class="form-group col-sm-12 flex-column d-flex"> 
                  <label class="form-control-label ">About Me</label>
                  <textarea name="edit-about" id="edit-about" cols="60" rows="5" value="<?php echo $data["About_me"]; ?>"></textarea>
                </div>
                <div class="row justify-content-between">
                  <div class="form-group col-sm-12 flex-column d-flex"> <label class="form-control-label ">Education</label> <input type="text" id="edit-education" name="edit-education" value="<?php echo $data["Education"]; ?>"> </div>
                  <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label ">Place of Graduation</label> <input type="text" id="edit-graduation" name="edit-graduation" value="<?php echo $data["Graduated"]; ?>"> </div>
                  <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label ">City</label> <input type="text" id="edit-city" name="edit-city" value="<?php echo $data["City"]; ?>"> </div>
                  <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label ">Province</label> <input type="text" id="edit-province" name="edit-province" value="<?php echo $data["Province"]; ?>"> </div>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-secondary" >Save Changes</button>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          </div>
          </form>
        </div>
      </div>
    </div>
    <?php } ?>
    <!-- Delete Profile Modal -->
    <div class="modal fade" id="deleteProfile" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="deleteProfileLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">          
            <div class="modal-body">
              <div class="d-flex flex-column align-items-center text-center">
                <h3>All your Progress on this Site will be Deleted</h3>

                <img src="images/alone.webp" alt="" height="168px">
                <h5>Do you wanna Delete the profile</h5>
                <form action="delete-prof.php" method="POST">
                  <button type="button" class="btn btn-primary" data-bs-dismiss="modal">no</button>
                  <button type="submit" name="delete" class="btn btn-primary" >Yes</button>
                </form>
              </div>
          </div>
        </div>
      </div>
    </div>

        <!-- Edit Profile Error  -->
    <div class="modal fade" id="editErrModal" tabindex="-1" aria-labelledby="editErrModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
             <p>Something went wrong!! Please try Again</p>
          </div>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Try Again</button>
        </div>
      </div>
    </div>

    <!-- Success PopUp -->
    <div class="modal fade" id="editSuccessModal" tabindex="-1" aria-labelledby="editSuccessModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
              <h6>Profile Successfully Edited</h6>
              <p>Please Login Again to Safeguard your Progress</p>
          </div>
            <a href="login.php"><button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Ok</button></a>
        </div>
      </div>
    </div>


</body>
    <!-- Additional Javascrpit Libiraries  -->
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script><script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="./libraries/dropify/js/dropify.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <script>
        let btn = document.querySelector('#sideBtn');
        let sidebar = document.querySelector('.sidebar');

        btn.onclick = function() {
            sidebar.classList.toggle("active");
        }

        $(document).ready(function(){
            $('.dropify').dropify();
        });
    </script>
    </html>
