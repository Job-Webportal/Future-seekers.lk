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
    require_once 'emp-profile.php';

    $user_array = array();

    $sql = "SELECT * FROM employers WHERE com_email='$email'";
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
    <link rel="stylesheet" href="./libraries/jquery-datatable/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="./libraries/jquery-datatable/fixedeader/dataTables.fixedcolumns.bootstrap4.min.css">
    <link rel="stylesheet" href="./libraries/jquery-datatable/fixedeader/dataTables.fixedheader.bootstrap4.min.css">
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
    <?php 
      foreach ($user_array as $data){ 
    ?>

    <div class="container-fluid home-content">
        <!-- Porfile Head -->
        <?php  
          if(!empty($data["company_picture"])){
            $hr_img = $data["company_picture"];
          } else {
            $hr_img="static-cover.webp";
          }  
        ?>
        <div class="row clearfix">
            <div class="col-md-12">
                <div class="card com-hero">
                    <img src="pictures/covers/<?php echo $hr_img ?>" alt="cover">
                </div>
            </div>
            <div class="col-md-12">
                <div class="card prof-card">
                    <div class="d-flex justify-content-between justify-content-center">
                        <div class="d-flex">
                          <?php 
                            if(!empty($data["com_logo"])){
                              $img = $data["com_logo"];
                            } else {
                              $img="static-logo.webp";
                            }  
                          ?>
                            <div class="prof-pic">
                                <img src="pictures/logo/<?php echo $img ?>" class="rounded" alt="">
                            </div>
                            <div class="details">
                                <h5><?php echo $data["com_name"];?></h5>
                                <span class="text-light"><?php if (empty($data["com_type"])) {
                                  echo "--Business Type--";
                                } else { echo $data["com_type"]; }?></span>
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
        <?php } ?>

      <!-- Employer Panel -->
        <div class="row clearfix">
          <div class="col-md-8 emp-panel">
            <div class="card">
              <div class="card-body">
              <h5 class="card-title">Employer Panel</h5>
              <h4>Recruitment Statistics</h4>
                <div class="row re-stat">
                  <div class="col card">
                    <h5 class="card-title">Ongoing Adverts</h5>
                    <p class="card-date">November 21, 2017</p>
                    <p class="card-text">0</p>
                  </div>
                  <div class="col card">
                    <h5 class="card-title">Total Applications</h5>
                    <p class="card-date">November 21, 2017</p>
                    <p class="card-text">0</p>
                  </div>
                  <div class="col card">
                    <h5 class="card-title">Total Posted Adverts</h5>
                    <p class="card-date">November 21, 2017</p>
                    <p class="card-text">0</p>
                  </div>
                  <div class="d-flex justify-content-around">
                    <button onclick="portal();" type="button" class="btn btn-labeled btn-info">
                    <span class="btn-label"><i class="bx bxl-c-plus-plus"></i></span>My Portal</button>
                    <button onclick="create();" type="button" class="btn btn-labeled btn-warning">
                    <span class="btn-label"><i class="bx bx-briefcase"></i></span>Post Job</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
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
        </div>

        <!-- Advert History -->
        <div class="row">
          <div class="col-md-12">
          <h5>Job Adverts</h5>
            <div class="card py-4 px-4">
              <div class="table-responsive">
                <table class="table table-hover js-basic-example dataTable table-custom spacing5">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Position</th>
                            <th>Office</th>
                            <th>Age</th>
                            <th>Start date</th>
                            <th>Salary</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Name</th>
                            <th>Position</th>
                            <th>Office</th>
                            <th>Age</th>
                            <th>Start date</th>
                            <th>Salary</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <tr>
                            <td>Jennifer Acosta</td>
                            <td>Junior Javascript Developer</td>
                            <td>Edinburgh</td>
                            <td>43</td>
                            <td>2013/02/01</td>
                            <td>$75,650</td>
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
        <!-- Company Portfolio -->
        <div class="row row-cols-1 g-4">
            <div class="col-md-8 emp-panel">
                <div class="card portfolio">
                    <div class="card-body">
                        <h5 class="card-title">Company Portfolio</h5>
                        <div class="row d-flex justify-content-center info-tile">
                          <div class="col d-flex flex-column align-items-center">
                            <h6>Email Address</h6>
                            <img src="images/gmail.gif" alt="">
                            <p><?php if (empty($data["com_web"])) {
                              echo "www.yourbusiness.com";
                            } else { echo $data["com_web"]; } ?></p>
                          </div>
                          <div class="col d-flex flex-column align-items-center">
                            <h6>Location</h6>
                            <img src="images/location.gif" alt="">
                            <p><?php if (empty($data["location"])) {
                              echo "Busines Location";
                            } else { echo $data["location"]; } ?></p>
                          </div>
                          <div class="col d-flex flex-column align-items-center">
                            <h6>Contact No.</h6>
                            <img src="images/phone.gif" alt="">
                            <p><?php if (empty($data["com_tel"])) {
                              echo "123 456 789";
                            } else { echo $data["com_tel"]; } ?></p>
                          </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <h4>Type of Employment</h4>
                                <p><?php if (empty($data["com_employ"])) {
                              echo "--Type--";
                            } else { echo $data["com_employ"]; } ?></p>
                            </div>
                            <div class="col">
                                <h4>Company Size</h4>
                                <p><?php if (empty($data["com_size"])) {
                              echo "XX - XXX";
                            } else { echo $data["com_size"]; } ?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <h4>Business Model</h4>
                                <p><?php if (empty($data["com_model"])) {
                              echo "--Model--";
                            } else { echo $data["com_model"]; } ?></p>
                            </div>
                            <div class="col">
                                <h4>Founded</h4>
                                <p><?php if (empty($data["founded"])) {
                              echo "--Year--";
                            } else { echo $data["founded"]; } ?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <h4>Vision</h4>
                                <p><?php if (empty($data["vision"])) {
                              echo "--Vision--";
                            } else { echo $data["vision"]; } ?></p>
                            </div>
                            <div class="col">
                                <h4>Mission</h4>
                                <p><?php if (empty($data["mission"])) {
                              echo "--Mission--";
                            } else { echo $data["mission"]; } ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?php 
              if(!empty($data["hr_picture"])){
                $hr_img = $data["hr_picture"];
              } else {
                $hr_img="static-user.webp";
              }  

            ?> 
            <!-- HR Admin Card -->
            <div class="col-md-4 mb-3 emp-panel">
              <div class="card">
                <div class="card-body">
                <h5 class="card-title">HR Personnel</h5>
                  <div class="d-flex flex-column align-items-center text-center hr-picture">
                    <img src="pictures/<?php echo $hr_img ?>" alt="Admin" class="rounded-circle">
                    <div class="mt-3">
                      <h4><?php if (empty($data["HR_Admin"])) {
                              echo "--Admin Full Name--";
                            } else { echo $data["HR_Admin"]; } ?></h4>
                      <p class="text-secondary mb-1"><?php if (empty($data["hr_position"])) {
                              echo "--Admin Postion--";
                            } else { echo $data["hr_position"]; } ?></p>
                      <p class="text-primary mb-1"><?php if (empty($data["hr_mail"])) {
                              echo "--Admin Email--";
                            } else { echo $data["hr_mail"]; } ?></p>
                    </div>
                  </div>
                </div>
            </div>
        </div>
        <!-- Company Overview & Our Services -->
        <div class="row">
          <div class="col-md-6">
          <h5 class="">Company Overview</h5>
              <div class="com-desc">
                <p id="description"><?php if (empty($data["com_desc"])) {
                              echo "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.";
                            } else { echo $data["com_desc"]; } ?></p>
              </div>
          </div>
          <div class="col-md-6">
          <h5 class="">Services</h5>
              <div class="com-services">
                <p id="services"><?php if (empty($data["com_service"])) {
                              echo "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.";
                            } else { echo $data["com_service"]; } ?></p>
              </div>
          </div>
        </div>
    </div>
    <?php  }  ?>

    <?php foreach ($user_array as $value) { ?>
    <!-- Edit Profile Modal -->
    <div class="modal fade" id="editProfile" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editProfileLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-body">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="edit-form-emp">
              <form action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method = "POST" enctype="multipart/form-data" autocomplete="off" novalidate="">
                      <div class="main-info">
                        
                        <h4>Basic Profile Information</h4>
                        <div class="row justify-content-between">
                          <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label ">Company Name</label> <input type="text" id="edit-name" name="edit-name" value="<?php echo $data["com_name"];?>"> </div>
                          <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label ">Email</label> <input type="text" id="edit-email" name="edit-email" value="<?php echo $data["com_email"];?>"> </div>
                          <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label ">Contact No.</label> <input type="text" id="edit_tel" name="edit_tel" value="<?php echo $data["com_tel"];?>"></div>
                          <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label ">Type of Business</label>     <select id="edit-type-business" name='edit-type-business' value="<?php echo $data["com_type"];?>">
                                    <option value="None">Select Industry</option>
                                    <option id="default1" value="Aerospace Industry">Aerospace Industry</option>
                                    <option value="Computer Industry">Computer Industry</option>
                                    <option value="Telecommunication industry">Telecommunication industry</option>
                                    <option value="Agriculture industry">Agriculture industry</option>
                                    <option value="Automobile industry">Automobile industry</option>
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
                              <input type="file" name="prof-logo" class="dropify" data-max-file-size="800K" value="">
                          </div>
                        </div>
                        <br>
                        <div class="cover-upload">
                          <div class="">
                              <h2>Upload a Cover Image</h2>
                          </div>
                          <div class="drop">
                              <input type="file" name="cover-picture" class="dropify" data-max-file-size="2500K" value="">
                          </div>
                        </div>
                      </div>
                      <h4>Company Information</h4>
                      <div class="com-info">
                        <div class="form-group col-sm-12 flex-column d-flex"> 
                          <label class="form-control-label ">Company Description</label>
                          <textarea name="edit-desc" id="edit-desc" cols="60" rows="5" value="<?php echo $data["com_desc"];?>"></textarea>
                        </div>
                        <div class="form-group col-sm-12 flex-column d-flex"> 
                          <label class="form-control-label ">Our Services</label>
                          <textarea name="edit-service" id="edit-service" cols="60" rows="5" value="<?php echo $data["com_service"];?>"></textarea>
                        </div>
                        <div class="row justify-content-between">
                          <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label ">Type of Employment</label> <input type="text" id="edit-employ" name="edit-employ" value="<?php echo $data["com_employ"];?>" > </div>
                          <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label ">Company Size</label> <input type="text" id="edit-size" name="edit-size" value="<?php echo $data["com_size"];?>" > </div>
                          <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label ">Location</label> <textarea id="edit-location" name="edit-location" cols="10" rows="2" value="<?php echo $data["location"];?>"></textarea> </div>
                          <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label ">Founded</label> <input type="text" id="edit-founded" name="edit-founded" value="<?php echo $data["founded"];?>" > </div>
                          <div class="form-group col-sm-12 flex-column d-flex"> <label class="form-control-label ">Business Model</label> <select id="edit-model" name='edit-model' value="<?php echo $data["com_model"];?>">
                                    <option value="None">Select Business Model</option>
                                    <option id="default1" value="Sole Proprietorship">Sole Proprietorship</option>
                                    <option value="Partnership">Partnership</option>
                                    <option value="Limited Partnership">Limited Partnership</option>
                                    <option value="Corporation">Corporation</option>
                                    <option value="Limited Liability Company">Limited Liability Company (LLC)</option>
                                    <option value="Nonprofit Organization">Nonprofit Organization</option>
                                    <option value="Cooperative">Cooperative (Co-op)</option>
                          </select> </div>
                        </div>
                        <div class="row"> <div class="form-group col-sm-12 flex-column d-flex"> <label class="form-control-label ">Company Webiste</label> <input type="text" id="edit-web" name="edit-web" value="<?php echo $data["com_web"];?>" > </div></div>
                        <div class="row"> <div class="form-group col-sm-12 flex-column d-flex"> <label class="form-control-label ">Mission</label> <input type="text" id="edit-mission" name="edit-mission" value="<?php echo $data["mission"];?>" > </div></div>
                        <div class="row"> <div class="form-group col-sm-12 flex-column d-flex"> <label class="form-control-label ">Vision</label> <input type="text" id="edit-vision" name="edit-vision" value="<?php echo $data["vision"];?>" > </div></div>
                      </div>
                      <h4>HR Admin Information</h4>
                      <div class="hr-admin-info">
                        <div class="row justify-content-between">
                          <div class="form-group col-sm-12 flex-column d-flex"> <label class="form-control-label ">Name</label> <input type="text" id="edit-hrname" name="edit-hrname" value="<?php echo $data["HR_Admin"];?>"> </div>
                          <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label ">Email</label> <input type="text" id="edit-hrmail" name="edit-hrmail" value="<?php echo $data["hr_mail"];?>" > </div>
                          <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label ">Position</label> <input type="text" id="edit-hrposition" name="edit-hrposition" value="<?php echo $data["hr_position"];?>"> </div>
                        </div>
                        <div class="row">
                          <div class="prof-upload">
                            <div class="">
                                <h2>Upload HR Admin Profile</h2>
                            </div>
                            <div class="drop">
                            <input type="file" name="hr_picture" class="dropify" data-max-file-size="800K" value="">
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="modal-footer">
                      <button type="submit" name="edit" class="btn btn-secondary">Save Changes</button>
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      </div>
              </form>
            </div>

          </div>
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

                <img src="images/sad.webp" alt="" height="78px">
                <h5>Do you wanna Delete the profile</h5>
                <form action="delete-prof.php" method="POST">
                  <button type="button" class="btn btn-primary" data-bs-dismiss="modal">no</button>
                  <a href="index.php"><button type="submit" name="delete" class="btn btn-primary" data-bs-dismiss="modal">Yes</button></a>
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
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="./libraries/bundles/datatablescripts.bundle.js"></script>
    <script src="./libraries/jquery-datatable/buttons/dataTables.buttons.min.js"></script>
    <script src="./libraries/jquery-datatable/buttons/buttons.bootstrap4.min.js"></script>
    <script src="./libraries/jquery-datatable/buttons/buttons.colVis.min.js"></script>
    <script src="./libraries/jquery-datatable/buttons/buttons.html5.min.js"></script>
    <script src="./libraries/jquery-datatable/buttons/buttons.print.min.js"></script>
    <script src="./libraries/js/pages/tables/jquery-datatable.js"></script>
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

      function portal() {
        window.location="portal.php";
      }
    
      function create() {
        window.location="post-job.php";
      }

    </script>
</html>