<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>


<?php

$n_mail = $email;
print $n_mail;
require_once 'config.php';

$tempname = $folder = "";

$user_array = array();
$mailArray = array();

$check_query = "SELECT `email` FROM `users`";
$result = mysqli_query($db_server, $check_query);

while($row = mysqli_fetch_assoc($result))
{
  $mailArray[] = $row;
}

$sql = "SELECT * FROM applicants WHERE Email='$n_mail'";
$results = mysqli_query($db_server, $sql);

  if (mysqli_num_rows($results) == 1){

    while($row = mysqli_fetch_assoc($results))
    {
      $user_array[] = $row;
    }
  }


  foreach ($user_array as $data) {
    $profile = $data["profile_picture"];
  }

  if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $fname = check_input($_REQUEST["edit-fname"]);
        $lname = check_input($_REQUEST["edit-lname"]);
        $a_email = check_input($_REQUEST["app_email"]);
        $contact = check_input($_REQUEST["edit-contact"]);
        $education = check_input($_REQUEST["edit-education"]);
        $about = check_input($_REQUEST["edit-about"]);
        $city = check_input($_REQUEST["edit-city"]);
        $province = check_input($_REQUEST["edit-province"]);
        $graduated =  check_input($_REQUEST["edit-graduation"]);

        // Upload Profile Image
        $profile = $_FILES["app_picture"]["name"];
        $tempname = $_FILES["app_picture"]["tmp_name"];    
        $folder = "pictures/".$profile;  

        move_uploaded_file($tempname, $folder);

        $sql = "UPDATE `applicants` SET `Firstname`='$fname',`Lastname`='$lname',`Email`='$a_email',`Contact_No`='$contact',`Education`='$education',`profile_picture`='$profile',`City`='$city',`Province`='$province',`About_me`='$about',`Graduated`='$graduated' WHERE `Email`='$n_mail'";
        $sql2 = "UPDATE `users` SET `email`='$a_email' WHERE `email` ='$n_mail'";
           
        if (mysqli_query($db_server, $sql) && mysqli_query($db_server, $sql2)) {
           echo '<script type="text/javascript">
           $(document).ready(function(){
             $("#editSuccessModal").modal("show");
           }); </script>';
         } else {
           echo '<script type="text/javascript">
           $(document).ready(function(){
             $("#editErrModal").modal("show");
           }); </script>';
        }
}

function check_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
 }

?>