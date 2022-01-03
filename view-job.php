<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script><script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<?php

require_once 'config.php';

session_start();
// if the set flag is used, set it

if(isset($_POST['setid'])) {
    $_SESSION['reference'] = $_POST['ref'];
    $_SESSION['type'] = $_POST['type'];
    $_SESSION['email'] = $_POST['name'];
    $_SESSION['verify'] = $_POST['verify'];

}

$email = $_SESSION['email'];
$type = $_SESSION['type'];
$ref = $_SESSION['reference'];
$head = "";
// Upload CV

if ($email == "null" && $type == "Applicant") {

    $sql = "SELECT Firstname, Lastname FROM `applicants` WHERE `Email` = $email";

    $results = mysqli_query($db_server, $sql);
    
    if (mysqli_num_rows($results) == 1){
  
      while($row = mysqli_fetch_assoc($results))
      {
        $head = $row["Firstname"]." ".$row["Firstname"];
    }
    }
}


if($_SERVER["REQUEST_METHOD"] == "POST"){


    $name = check_input($email);
    $company = check_input($_REQUEST['owner']);
    $reference = check_input($_REQUEST['reference']);

    $location = $_FILES['document']['name'];
    $tempname = $_FILES['document']['tmp_name'];    
    $folder = "cvs/".$location;  

    move_uploaded_file($tempname, $folder);

    $sql = "INSERT INTO `cvs` (`name`, `email`, `cv`, `Reference`, `Company`, `status`) VALUES ('$head', '$name','$location','$reference','$company','0')";

    if (mysqli_query($db_server, $sql)) {
        echo '<script type="text/javascript">
        $(document).ready(function(){
          $("#successModal").modal("show");
        });
        </script>';
     } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($db_server);
     }
}

function check_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$adArray = array();
  
$sql = "SELECT * FROM `adverts` WHERE `reference` = '$ref'";
$results = mysqli_query($db_server, $sql);

while($row = mysqli_fetch_assoc($results))
{
    $adArray[] = $row;
}


foreach ($adArray as $data){   


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $data["Job_Title"] ?> Job Advert</title>
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/CSS3.css">
    <link rel="stylesheet" href="./libraries/dropify/css/dropify.min.css">
</head>
<body>
    <div id="view">
        <div class="row d-flex justify-content-center py-3 rounded">
            <div class="col-md-5 view">
                <div class="view-title"><h5><?php echo $data["Job_Title"] ?></h5></div>
                <div class="view-refer d-flex flex-row justify-content-between">
                    <h6><?php echo $data["Company"] ?></h6>
                    <p>Ref No. <?php echo $data["reference"] ?></p>
                </div>
                <div class="view-detail d-flex flex-row ">
                    <p class="col-md-8"><span>Category: </span><?php echo $data["Job_Category"] ?></p>
                    <p class="col-md-4"><span>Location: </span><?php echo $data["Job_Location"] ?></p>
                </div>
                <div class="view-detail d-flex flex-row ">
                    <p class="col-md-6"><span>Minimum Salary: </span><?php echo $data["minimum_lkr"] ?></p>
                    <p class="col-md-6"><span>Maximum Salary: </span><?php echo $data["maximum_lkr"] ?></p>
                </div>
                <div class="view-detail d-flex flex-row ">
                    <p class="col-md-6"><span>City: </span><?php echo $data["City"] ?></p>
                    <p class="col-md-6"><span>Province: </span><?php echo $data["Province"] ?></p>
                </div>
                <div class="view-detail d-flex flex-row ">
                    <p class="col-md-6"><span>Experience: </span><?php echo $data["Experience"] ?></p>
                    <p class="col-md-6"><span>Education: </span><?php echo $data["Education"] ?></p>
                </div>
                <div class="view-detail d-flex flex-row ">
                    <p class="col-md-6"><span>Post Date: </span><?php echo $data["created_at"] ?></p>
                    <p class="col-md-6"><span>Close Date: </span><?php echo $data["expiry"] ?></p>
                </div>
                <p class="view-detail"><span>Type of Employment: </span><?php echo $data["Job_Type"] ?></p>
                <div class="cv">
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">
                        <input class="read" name="reference" type="text" value="<?php echo $data["reference"] ?>" readonly>
                        <input class="read" name="owner" type="text" value="<?php echo $data["Job_Owner"] ?>" readonly>
                        <div class="form-group mt-2 mb-2">
                            <label class="text-dark">Upload Your CV Here:</label>
                            <div class="pdf_drop">
                                <input name="document" type="file" class="dropify" data-height="100" data-max-file-size="5M" data-allowed-file-extensions="pdf"/>
                            </div>                                
                        </div>
                        <div class="d-flex justify-content-end">
                            <button class="btn btn-primary btn-sm">Apply Now</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-5 view">
                <div class="view-bar d-flex justify-content-between rounded">
                    <a href="adverts/<?php echo $data["Job_file"] ?>" target="_blank">Click to View Job Flyer</a>    
                    <div class="view-stat d-flex flex-row">
                        <i class='bx bx-show'></i>
                        <p><?php echo $data["views"] ?></p>
                    </div>
                </div>
                <div class="tile-badge d-flex flex-row">
                        <?php         
                        $now = time();
                        $your_date = strtotime($data["expiry"]);
                        $datediff = $your_date - $now;
                        $num = round($datediff / (60 * 60 * 24));
                        if ($num > 5) {
                        $icon = '<i class="bx bxs-bolt"></i>                      
                                <p>Actively Hiring</p>';
                        } else {
                        $icon = '<i class="bx bxs-timer tim"></i>  
                                <p>Urgently Hiring</p>';
                        } ?>
                        <?php echo $icon ?>
                </div>
                <div class="view-desc" >
                <p class="view-detail"><span>Job Description : </span></p>
                    <div class="scroll">
                        <?php echo $data["Description"] ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Success Modal -->
    <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-body">
            <div class="message d-flex flex-column align-items-center">
              <img src="images/happy.webp" alt="">
              <h3>You have Successfully Submitted your Job Application</h3>
              <p>The Employer will get back to you soon</p>
              </div>
            </div>   
            <div class="d-flex justify-content-center">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="link();">Okay</button>
            </div>       
          </div>
      </div>
      </div>
    </div>
</body>
<?php } ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="./libraries/dropify/js/dropify.min.js"></script>
<script>
        $(document).ready(function(){
            $('.dropify').dropify();
        });

        function link(){
            window.location="applicant.php";
        }
</script>
</html>

<?php
                                            $refer = $data["reference"]; 
                                            $sql2 = "SELECT `name`, `email`, `cv`, `Company`, `created_at` FROM `cvs` WHERE `Reference` = `$refer`";
                                            $results2 = mysqli_query($db_server, $sql2);
                                        
                                            while($row = mysqli_fetch_assoc($results2))
                                            {
                                                $cvArray[] = $row;
                                            }
                                        ?>
                                        <?php   foreach ($cvArray as $value){  ?>
