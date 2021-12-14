<?php
  session_start();

  // Check if the user is logged in, if not then redirect him to login page
  if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
  header("location: login.php");
  exit;
  }
  
  require_once 'admin-script.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="./libraries/jquery-datatable/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="./libraries/jquery-datatable/fixedeader/dataTables.fixedcolumns.bootstrap4.min.css">
    <link rel="stylesheet" href="./libraries/jquery-datatable/fixedeader/dataTables.fixedheader.bootstrap4.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/CSS2.css">
    <title>Adminstration</title>
</head>
<body>
  <!-- Sidebar -->
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
    <div class="container-fluid home-content admin">
      <div class="row row-cols-1 row-cols-md-3 g-3 stat-card">
        <div class="col">
            <div class="card card-orange">
                <div class="card-body">
                    <h5 class="card-title">Active Users</h5>
                    <p class="card-date">November 21, 2017</p>
                    <p class="card-text">23</p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card card-blue">
                <div class="card-body">
                    <h5 class="card-title">Total Job Adverts</h5>
                    <p class="card-date">November 21, 2017</p>
                    <p class="card-text">50</p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card card-green">
                <div class="card-body">
                    <h5 class="card-title">Ongoing Job Adverts</h5>
                    <p class="card-date">November 21, 2017</p>
                    <p class="card-text">20</p>
                </div>
            </div>
        </div>
     </div>
        <div class="row row-sm">
          <div class="col-md-6 verify-table">
            <div class="card verify-card">
              <h6 class="card-title">Employer Verification</h6>
              <p class="card-text">A bar chart or bar graph is a chart with rectangular bars with lengths proportional to the values that they represent.</p>
              <div id="table-emp" class="table-responsive">
                <table class="table table-borderless table-hover">
                  <thead>
                      <tr>
                        <th scope="col">Company Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Created at</th>
                        <th scope="col">Status</th>
                      </tr>
                  </thead>
                    <tbody>
                      <?php 
                        foreach ($return_emp as $value){ 
                      ?>
                      <tr>
                        <td> <?php echo $value['com_name']; ?> </td> 
                        <td> <?php echo $value['com_email']; ?> </td>
                        <td> <?php echo $value['created_at']; ?> </td>
                        <td><button data-email="<?php echo $value['com_email'];?>" class="user_verify"> <?php echo '<span class="badge bg-warning text-dark">Waiting for Approval</span>';?></button> </td>
                      </tr>
                      <?php } ?>
                    </tbody>
                </table>
              </div>
            </div><!-- card -->
          </div><!-- col-6 -->

          <!-- Users Verification Table -->
          <div class="col-md-6 verify-table">
            <div class="card verify-card">
            <h6 class="card-title">Applicant Verification</h6>
              <p class="card-text">A bar chart or bar graph is a chart with rectangular bars with lengths proportional to the values that they represent.</p>
                <div id="table-app" class="table-responsive">
                  <table class="table table-borderless table-hover">
                  <thead>
                      <tr>
                        <th scope="col">First Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Created at</th>                      
                        <th scope="col">Status</th>
                      </tr>
                  </thead>
                    <tbody>
                      <?php 
                        foreach ($return_app as $value){ 
                      ?>
                      <tr>
                      <td> <?php echo $value['Firstname']; ?> </td> 
                      <td> <?php echo $value['Email']; ?> </td>
                      <td> <?php echo $value['created_at']; ?> </td>
                      <td><button data-email2="<?php echo $value['Email'];?>" class="user_verify_app"> <?php echo '<span class="badge bg-warning text-dark">Waiting for Approval</span>';?></button> </td>
                      </tr>
                      <?php } ?>

                    </tbody>
                  </table>
                </div>
            </div><!-- card -->
          </div><!-- col-6 -->
          
          <!-- All User Table -->
          <div class="row">
              <div class="col-md-12 emp-table">
                  <div id="emp-table-card" class="card py-4 px-4">
                    <h6 class="card-title">User List</h6>
                      <div class="table-responsive">
                        <table class="table table-striped table-hover dataTable js-exportable">
                            <thead>
                                <tr>
                                  <th>ID</th>
                                  <th>Email</th>
                                  <th>Verified</th>
                                  <th>User Type</th>
                                  <th>View Info</th>
                                </tr>        
                            </thead>
                            <tfoot>
                                <tr>
                                  <th>ID</th>
                                  <th>Email</th>
                                  <th>Verified</th>
                                  <th>User Type</th>
                                  <th>View Info</th>
                                </tr>
                            </tfoot>
                            <tbody>
                              <?php 
                              foreach ($return_value as $value){ 
                              ?>
                              <tr>
                                <td> <?php echo $value['id']; ?> </td>
                                <td> <?php echo $value['email']; ?> </td>
                                <td> <?php if ($value['verified'] == 1) { echo "Yes"; } else {echo "No";}?> </td>
                                <td> <?php echo $value['Type']; ?> </td> 
                                <td> <?php echo '<button class="view_user" data-name="$value["email"]">View</button>'?> </td> 
                              </tr>
                              <?php } ?>

                            </tbody>
                        </table>
                      </div>                                            
                  </div>
              </div>
          </div>

          <!-- <div class="row">
              <div class="col-md-12">
                  <div class="card">
                     <h6 class="card-title">Admin Dashboard</h6>
                        <div class="inner-card">
                            <button class="btn btn-primary" >Modal</button>
                        </div>
                  </div>
              </div>
          </div>
        </div> -->

        <!-- User Verification Modal -->
        <div class="modal fade" id="viewVerifyInfo" tabindex="-1" aria-labelledby="viewVerifyInfoLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="viewVerifyInfoLabel">User Verification</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                
              </div>
            </div>
          </div>
        </div>


</body>

    <!-- Additional Javascrpit Libiraries  -->
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script><script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="./libraries/bundles/datatablescripts.bundle.js"></script>
    <script src="./libraries/jquery-datatable/buttons/dataTables.buttons.min.js"></script>
    <script src="./libraries/jquery-datatable/buttons/buttons.bootstrap4.min.js"></script>
    <script src="./libraries/jquery-datatable/buttons/buttons.colVis.min.js"></script>
    <script src="./libraries/jquery-datatable/buttons/buttons.html5.min.js"></script>
    <script src="./libraries/jquery-datatable/buttons/buttons.print.min.js"></script>
    <script src="./libraries/js/pages/tables/jquery-datatable.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    
    <script type="text/javascript">

        $(document).ready(function(){
          $('.user_verify').click(function(){
            let email = $(this).data('email');
            $.ajax({
              url: 'verify-emp.php',
              type: 'post',
              data: {email: email},
              success: function(response){
                $('.modal-body').html(response);
                  $("#viewVerifyInfo").modal("show");
              }
            });
          });
        });

        $(document).ready(function(){
          $('.user_verify_app').click(function(){
            let email = $(this).data('email2');
            $.ajax({
              url: 'verify-app.php',
              type: 'post',
              data: {email: email},
              success: function(response){
                $('.modal-body').html(response);
                  $("#viewVerifyInfo").modal("show");
              }
            });
          });
        });




        let btn = document.querySelector('#sideBtn');
        let sidebar = document.querySelector('.sidebar');

        btn.onclick = function() {
            sidebar.classList.toggle("active");
        }

    </script>
</html>
