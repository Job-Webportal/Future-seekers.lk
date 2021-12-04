<?php
    session_start();

    require_once 'config.php';

      if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $com_name = check_input($_REQUEST["edit-name"]);  
        $com_email = check_input($_REQUEST['edit-email']);
        $com_tel = check_input($_REQUEST['edit-tel']);
        $HR_Admin = check_input($_REQUEST['edit-hr-fname']) + check_input($_REQUEST['edit-hr-lname']);
        $com_desc = check_input($_REQUEST['edit-desc']);
        $com_size = check_input($_REQUEST['edit-size']);
        $com_type = check_input($_REQUEST['edit-business-type']);
        $com_head = check_input($_REQUEST['edit-head']);
        $founded = check_input($_REQUEST['edit-founded']);
        $vision = check_input($_REQUEST['edit-vision']);
        $mission = check_input($_REQUEST['edit-mission']);
        $hr_position = check_input($_REQUEST['edit-hrposition']);
        $hr_mail = check_input($_REQUEST['edit-hrmail']);

  
        // Checking for Existing Employer (Email)
        $user_check_query = "SELECT * FROM employers WHERE com_email = '$com_email' LIMIT 1";
  
        $results = mysqli_query($db_server, $user_check_query);
        if (mysqli_num_rows($results) > 0) {
  
           $row = mysqli_fetch_assoc($results);
  
           if ($com_email == $row['com_email']) {
  
              $comLogin = "Email already exists";
  
           }
        } else {
           $sql = "INSERT INTO employers (com_name, com_email, com_tel, HR_Admin, com_desc, com_size, com_type, com_head, founded, vision, mission, hr_position, hr_mail) VALUES ('$com_name','$com_email', '$com_tel', '$HR_Admin', '$com_desc', '$com_size', '$com_type', '$com_head', '$founded', '$vision', '$mission','$hr_position', '$hr_mail')";
           $sql2 = "INSERT INTO users (email) VALUES ('$com_email');";
           if (mysqli_query($db_server, $sql) && mysqli_query($db_server, $sql2)) {
              $comLogin = "Profile Edited Succesfuly";
              session_unset();
              session_destroy();
              header("location: login.php");
            } else {
              echo "Error: " . $sql . "<br>" . mysqli_error($db_server);
           }
        }
  
    }


    function check_input($data) {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
   }

?>