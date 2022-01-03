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

// Generate Unique Reference Number

function random_strings($length_of_string) {
    // String of all alphanumeric character
    $str_result = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
  
    // Shuffle the $str_result and returns substring
    // of specified length
    return substr(str_shuffle($str_result), 0, $length_of_string);
}
$err = "";
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
// Save Job Advert

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $job_title = check_input($_REQUEST["title"]);
    $job_refer = check_input($_REQUEST['refer']);
    $category = check_input($_REQUEST['category']);
    $location = check_input($_REQUEST['location']);
    $province = check_input($_REQUEST['province']);
    $city = check_input($_REQUEST['city']);
    $experience = check_input($_REQUEST['experience']);
    $type = check_input($_REQUEST['type']);
    $education = check_input($_REQUEST['education']);
    $job_desc = strip_tags($_REQUEST['job-desc'], '<p><a><li><ul>');
    $minimum_lkr = check_input($_REQUEST['minimum_lkr']);
    $maximum_lkr = check_input($_REQUEST['maximum_lkr']);
    $expiry = check_input($_REQUEST['expiry']);
    // Upload Job file
    $filejob = $_FILES["document"]["name"];
    $tempname = $_FILES["document"]["tmp_name"];    
    $folder = "adverts/".$filejob;  

    move_uploaded_file($tempname, $folder);

    foreach ($user_array as $data){
        $cname = $data["com_name"]; 
        $sql = "INSERT INTO `adverts` (`reference`, `Job_Owner`, `Company`, `Job_Title`, `Job_Category`, `Job_Location`, `City`, `Province`, `Experience`, `Job_Type`, `Education`, `Description`, `minimum_lkr`, `maximum_lkr`, `expiry`, `Job_file`) VALUES ('$job_refer','$email', '$cname', '$job_title','$category','$location','$city','$province','$experience','$type','$education','$job_desc','$minimum_lkr','$maximum_lkr','$expiry','$filejob')";
    } 

    if (mysqli_query($db_server, $sql)) {
       $err = "Successfully Created Job";
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
 
$db_server->close();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="IE=edge" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post a Job</title>
    <link rel="stylesheet" href="css/CSS1.css">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="./libraries/calendar/dist/mc-calendar.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./libraries/dropify/css/dropify.min.css">

</head>
<body>
    <div class="header d-flex justify-content-center">
        <h3>FutureSeekers</h3>
    </div>
    <div class="postbar">
        <form id="post-form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" enctype="multipart/form-data" autocomplete="off" novalidate="">
            <fieldset class="customLegend">
                <legend>Create Your Job Advert:</legend>
                    <div class="row py-2 px-2">
                        <div class="col-md-12">
                            <div class="form-group mt-2">
                                <label class="text-dark">Job Title</label>
                                <input id="job-title" name="title" type="text" class="form-control resume" placeholder="">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group mt-2">
                                    <label class="text-dark">Reference No.</label>
                                    <input id="ref-no" name="refer" type="text" class="form-control resume" value="<?php echo random_strings(10); ?>" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group app-label mt-2">
                                    <label class="text-dark">Job Type</label>
                                    <div class="form-button">
                                        <select class="nice-select rounded" name="type">
                                            <option value="">Job Type</option>
                                            <option value="Full Time">Full Time</option>
                                            <option value="Part Time">Part Time</option>
                                            <option value="Contract">Contract</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group app-label mt-2">
                                    <label class="text-dark">Job Category</label>
                                    <div class="form-button">
                                        <select class="nice-select rounded" name="category">
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
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group app-label mt-2">
                                    <label class="text-dark">City</label>
                                    <input name="city" type="text" class="form-control resume" placeholder="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group app-label mt-2">
                                    <label class="text-dark">Province</label>
                                    <div class="form-button">
                                        <select class="nice-select rounded" name="province">
                                            <option value="">Province</option>
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
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group app-label mt-2">
                                    <label class="text-dark">Minimum Salary (LKR)</label>
                                    <input name="minimum_lkr" class="form-control resume" placeholder="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group app-label mt-2">
                                    <label class="text-dark">Maximum Salary (LKR)</label>
                                    <input name="maximum_lkr" type="number" class="form-control resume" placeholder="">    
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group app-label mt-2">
                                    <label class="text-dark">Education Level</label>
                                    <div class="form-button">
                                        <select class="nice-select rounded" name="education">
                                            <option value="">-</option>
                                            <option value="Basic Diploma">Basic Diploma</option>
                                            <option value="Bachelor degree">Bachelor's degree</option>
                                            <option value="Master degree">Master's degree</option>
                                            <option value="Doctoral degree">Doctoral degree</option>
                                        </select>
                                    </div>
                                </div>               
                            </div>
                            <div class="col-md-6">
                                <div class="form-group app-label mt-2">
                                    <label class="text-dark">Experience Level</label>
                                    <div class="form-button">
                                        <select class="nice-select rounded" name="experience">
                                            <option value="">-</option>
                                            <option value="Internship">Internship</option>
                                            <option value="Entry Level">Entry Level</option>
                                            <option value="Mid Level">Mid Level</option>
                                            <option value="Senior Level">Senior Level</option>
                                        </select>
                                    </div>    
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mt-2">
                                    <label class="text-dark">Expiry Date</label>
                                    <input name="expiry" id="expiry" type="text" class="form-control" readonly> 
                                </div>                               
                            </div>
                            <div class="col-md-6">
                                <div class="form-group app-label mt-2">
                                    <label class="text-dark">Job Location</label>
                                    <div class="form-button">
                                        <select class="nice-select rounded" name="location">
                                            <option value="">-</option>
                                            <option value="Both">Both</option>
                                            <option value="On-site">On-site</option>
                                            <option value="Remote">Remote</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group app-label mt-2">
                                    <label class="text-dark">Job Description</label>
                                    <textarea id="summernote" name="job-desc"></textarea>                                
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group mt-2">
                                    <label class="text-dark">Upload Job Images or Documents</label>
                                    <div class="pdf_drop">
                                        <input name="document" type="file" class="dropify" data-height="125" data-max-file-size="5M" data-allowed-file-extensions="pdf"/>
                                    </div>                                
                                </div>    
                            </div>
                        </div>
                        <div class="submitJob mt-4">
                            <button class="btn btn-primary" type="submit">Post Advert</button>
                        </div>
                        <?php echo $err;?>
                    </div>
            </fieldset>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="./libraries/dropify/js/dropify.min.js"></script>
    <script src="./libraries/calendar/dist/mc-calendar.min.js" type="text/javascript"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>

    <script>
        $(document).ready(function(){
            $('.dropify').dropify();
        });

        const myDatePicker = MCDatepicker.create({ 
            el: '#expiry',
            dateFormat: 'YYYY-MM-DD', 
            bodyType: 'modal',
            minDate: new Date(2021, 11, 27)
        })
    
        $('#summernote').summernote({
            placeholder: 'Enter your Job Description',
            tabsize: 2,
            height: 120,
            toolbar: [
              ['style', ['style']],
              ['font', ['bold', 'underline', 'clear']],
              ['color', ['color']],
              ['para', ['ul', 'ol', 'paragraph']],
              ['table', ['table']],
              ['insert', ['link', 'picture', 'video']],
              ['view', ['fullscreen', 'codeview', 'help']]
            ]
        });

        function back() {
            window.location="employer.php";
        }
    </script>
    
</body>
</html>