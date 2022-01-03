<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script><script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<?php 

session_start();

// Check if the user is logged in, if not then redirect him to login page
    if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
        header("location: login.php");
        exit;
    }

    if (!isset($_SESSION['type']) || $_SESSION['type'] !== 'Employer') {
        header("location: index.php");
        exit;
    } 

    require_once 'config.php';
    $email = $_SESSION["name"];
    $user_array = array();
    $sql = "SELECT * FROM employers WHERE com_email='$email'";
    $results = mysqli_query($db_server, $sql);
    
      if (mysqli_num_rows($results) == 1){
    
        while($row = mysqli_fetch_assoc($results))
        {
          $user_array[] = $row;
        }
      }
    $adArray = array();
    $cvArray = array();
    
    $sql = "SELECT `reference`, `Job_Title`, `expiry`, DATE(`created_at`) FROM `adverts` WHERE Job_Owner='$email'";
    $results = mysqli_query($db_server, $sql);
  
    while($row = mysqli_fetch_assoc($results))
    {
        $adArray[] = $row;
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Portal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="css/CSS2.css">

</head>
<body>
    <?php 
        foreach ($user_array as $data){ 

        if(!empty($data["com_logo"])){
            $img = $data["com_logo"];
            } else {
            $img="static-logo.webp";
            } 
    ?>            
            <div class="minibar">
                <div class="d-flex flex-row justify-content-between align-items-center">
                    <div class="mini-logo d-flex flex-row align-items-end">
                        <img src="pictures/logo/<?php echo $img ?>" class="rounded" alt="">
                        <h5><?php echo $data["com_name"]; ?></h5>
                    </div>
                    <div class="mini-links d-flex flex-row align-items-center">
                        <a href="portal.php">My Portal</a>
                        <a href="post-job.php">Post a Job</a>
                        <i class='bx bx-log-in-circle' onclick="back();"></i>                    
                    </div>
                </div>
                <?php } ?>
            </div>
            <div class="container">
            <?php foreach ($adArray as $data){ $refer = $data["reference"];?>                
                <div class="myJob rounded">
                    <div class="row">
                        <div class="col-md-5">
                            <h5><?php echo $data["Job_Title"];?></h5>
                            <p class="myRef">Reference No: <span><?php echo $data["reference"];?></span> </p>

                        </div>
                        <div class="col-md-5">
                            <p class="myOpen">Post Date: <span><?php echo $data["DATE(`created_at`)"];?></span> </p>
                            <p class="myOpen">Expiry Date: <span><?php echo $data["expiry"];?></span> </p>
                        </div>
                        <div class="col-md-2 myUti">
                            <div class="myDel d-flex flex-row align-items-center py-1" type="button" onclick="">
                                <i class='bx bxs-trash-alt'></i>
                                <p>Delete Advert</p>
                            </div>
                            <!-- <div class="myView d-flex flex-row align-items-center py-1 opener" type="button" > 
                                <i class='bx bx-street-view'></i>
                                <p>View CVs</p>
                            </div> -->
                        </div>

                        <div class="row">
                            <div id="cvs" class="col-md-12 d-flex justify-content-center rounded open" type="button">
                                <b>View Applied Candidates</b>
                            </div>
                            <div class="content" style="display: none;">
                                <div class="table-responsive">
                                    <table class="table table-hover js-basic-example dataTable table-custom spacing5">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Submitted On</th>
                                                <th>CV</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>               
                                            <tr>
                                                <td><?php echo "                        <div class='action d-flex flex-row'>
                                                    <div class='d-flex flex-row'><i class='bx bx-check-double'></i> <p>Accept</p></div>
                                                    <div class='d-flex flex-row'><i class='bx bx-x'></i> <p>Reject</p></div>
                                                    <div class='d-flex flex-row'><i class='bx bxs-flag-alt'></i> <p>Report</p></div> 
                                                </div>" ?></td>
                                            </tr>

                                        </tbody>

                                    </table>
                                </div>  
                            </div>
                        </div>
                    </div>

                </div>
                <?php } ?>

            </div>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script>
    $( ".open" ).click(function() {
        $(this).next(".content").slideToggle( "slow", function() {
        // Animation complete.
    });
    });

    function back() {
        window.location="employer.php";
    }

</script>
</html>