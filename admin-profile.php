<?php
    require_once 'config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Adminstration</title>
    <!-- CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container my-container">
        <div class="row my-row align-items-center">
            <div class="col d-flex justify-content-center">
                Welcome! Admin Cleo
            </div>
        </div>
        <div class="row my-row align-items-center">
            <div class="col d-flex justify-content-center">
                Lets Set you up!!!
            </div>
        </div>
    </div>
    <div class="container stat-board">
        <div class="row">
            <div class="col d-flex justify-content-center my-col">
                Daily Visits
            </div>
            <div class="col d-flex justify-content-center my-col">
                Current Users
            </div>
            <div class="col d-flex justify-content-center my-col">
                Active Users
            </div>
        </div>
        <div class="row justify-content-around">
            <div class="col d-flex justify-content-center my-col">
                Total Job Advert Count
            </div>
            <div class="col d-flex justify-content-center my-col">
                Ongoing Job Advert Count
            </div>
        </div>
    </div>
    
    <?php 
        $sql_app = "SELECT * FROM applicants";
        $result_app = mysqli_query($db_server, $sql_app);
    ?>

    <div class="container">
        <div class="row">
            <div class="col dis-col">
                <table class="table table-hover">
                    <tbody>
                        <?php if (mysqli_num_rows($result_app) > 0) { while ($row = mysqli_fetch_assoc($result_app)) { ?>
                        <tr>
                            <td><a href="#" data-toggle="modal" data-target="#showModalApp"><?php echo $row['Firstname']; ?></a></td> 
                            <td><?php echo $row['id'];?></td>

                        </tr>
                        <?php } } ?>
                    </tbody>
                </table>
            </div>
                <?php 
                    $sql_emp = "SELECT * FROM employers";
                    $result_emp = mysqli_query($db_server, $sql_emp);
                ?>
            <div class="col dis-col">
            <table class="table table-hover">
                    <tbody>
                        <?php if (mysqli_num_rows($result_emp) > 0) { while ($row = mysqli_fetch_assoc($result_emp)) { ?>
                        <tr>
                            <td><a href="#" data-toggle="modal" data-target="#showModalEmp"><?php echo $row['com_name']; ?></a></td> 
                            <td><?php echo $row['id'];?></td>

                        </tr>
                        <?php } } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <br> <br>
        <?php 
            $sql_app = "SELECT * FROM applicants";
            $result_app = mysqli_query($db_server, $sql_app);
        ?>
    <div class="container">
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <th>ID</th>
                    <th>Firstname</th>
                    <th>Lastname</th>
                    <th>Email</th>
                    <th>Ph. Number</th>
                    <th>Education</th>
                    <th>Verified</th>
                </thead>
                <tbody>
                    <?php if (mysqli_num_rows($result_app) > 0) { while ($row = mysqli_fetch_assoc($result_app)) { ?>
                        <tr>
                            <!-- <td><a href="#" data-toggle="modal" data-target="#showProfileModal">  </a></td>  -->
                            <td><?php echo $row['id'];?></td>
                            <td><?php echo $row['Firstname'];?></td>
                            <td><?php echo $row['Lastname'];?></td>
                            <td><?php echo $row['Email'];?></td>
                            <td><?php echo $row['Contact_No'];?></td>
                            <td><?php echo $row['Eductaion'];?></td>
                            <td><?php echo $row['Verified'];?></td>
                        </tr>
                    <?php } } ?>
                </tbody>
            </table>
        </div>
    </div>
    <?php 
        $sql_emp = "SELECT * FROM employers";
        $result_emp = mysqli_query($db_server, $sql_emp);
    ?>
    <div class="container">
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <th>ID</th>
                    <th>Company Name</th>
                    <th>Email</th>
                    <th>Number</th>
                    <th>Business Registration Number</th>
                    <th>Verified</th>
                </thead>
                <tbody>
                    <?php if (mysqli_num_rows($result_emp) > 0) { while ($row = mysqli_fetch_assoc($result_emp)) { ?>
                        <tr>
                            <!-- <td><a href="#" data-toggle="modal" data-target="#showProfileModal"> </a></td>  -->
                            <td><?php echo $row['id'];?></td>
                            <td><?php echo $row['com_name'];?></td>
                            <td><?php echo $row['com_email'];?></td>
                            <td><?php echo $row['com_number'];?></td>
                            <td><?php echo $row['com_bsn'];?></td>
                            <td><?php echo $row['Verified'];?></td>
                        </tr>
                    <?php } } ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Applicant - Modal -->
    <div class="modal fade" id="showModalApp" role="dialog" aria-labelledby="showModalAppLabel" aria-hidden="true">
          <div class= "modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-body">
                  <div class="container">
                    <div class="row">
                      <div class="col-8 d-flex justify-content-center head-col">
                        <h2>Attention! - New User</h2>
                      </div>
                    </div>
                    <div class="row"><div class="col-8">
                      <h6>User Information - Applicant</h6>
                    </div></div>
                    <div class="row"> 
                      <div class="col-8 d-flex justify-content-between">
                        <fieldset>
                          <table class="verify-tb">
                            <tr><td><b>Name</b></td> <td>Renesh</td></tr>
                            <tr><td><b>E-mail</b></td> <td>reneshbenedict@gmail.com</td></tr>
                            <tr><td><b>Ph Number</b></td> <td>011 202 0211</td></tr>
                            <tr><td><b>Education</b></td> <td>APIIT</td></tr>
                          </table> 
                        </fieldset>
                      </div>
                    </div>
                  </div>
                <br><br>
                <button type="button" class="btn btn-primary">Verify</button>
              </div>
            </div>
          </div>
        </div>

    <!-- Employer - Modal -->
    <div class="modal fade" id="showModalEmp" role="dialog" aria-labelledby="showModalEmpLabel" aria-hidden="true">
          <div class= "modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-body">
                  <div class="container">
                    <div class="row">
                      <div class="col-8 d-flex justify-content-center head-col">
                        <h2>Attention! - New User</h2>
                      </div>
                    </div>
                    <div class="row"><div class="col-8">
                      <h6>User Information - Employers</h6>
                    </div></div>
                    <div class="row"> 
                      <div class="col-8 d-flex justify-content-between">
                        <fieldset>
                          <table class="verify-tb">
                            <tr><td><b>Name</b></td> <td>Renesh</td></tr>
                            <tr><td><b>E-mail</b></td> <td>reneshbenedict@gmail.com</td></tr>
                            <tr><td><b>Ph Number</b></td> <td>011 202 0211</td></tr>
                            <tr><td><b>Education</b></td> <td>APIIT</td></tr>
                          </table> 
                        </fieldset>
                      </div>
                    </div>
                  </div>
                <br><br>
                <button data-id="<?php echo $row['id'];?>" type="button" class="btn verify">Verify</button>
              </div>
            </div>
          </div>
        </div>

</body>
    <!-- Additional Javascrpit Libiraries  -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <script type="text/javascript">
            $(document).ready(function(){
                $('.verify').click(function(){
                    let userid
                });
            });
    </script>

</html>