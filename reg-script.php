<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>

<?php

require_once 'config.php';


if (isset($_POST["firstname"])) {

   // Instalising Variables (Job Seeker)
   $nameErr = $emailErr = $contactErr = $passwordErr = "";
   $name = $email = $contact = $password_app = "";
   $comLogin = "";

   // Getting User Input from Registration Form (Job Seeker)
   if ($_SERVER["REQUEST_METHOD"] == "POST") {

      $first_name = check_input($_REQUEST["firstname"]);
   
      $last_name = check_input($_REQUEST['lastname']);
   
      $password_app = check_input($_REQUEST['password']);
      $password_app = password_hash($password_app, PASSWORD_DEFAULT);
   
      $email = $_REQUEST['email'];
   
      $contact = $_REQUEST['contact'];
   
      // Checking for Existing Applicant (Email)
      $user_check_query = "SELECT * FROM applicants WHERE Email= '$email' LIMIT 1";
   
      $results = mysqli_query($db_server, $user_check_query);

      if (mysqli_num_rows($results) > 0) {

         $row = mysqli_fetch_assoc($results);

         if ($email == $row['Email']) {

            echo '<script type="text/javascript">
            $(document).ready(function(){
              $("#emailModal").modal("show");
            });
            </script>';

         } 
      } else {
         $sql = "INSERT INTO applicants (firstname, Lastname, password, Email, Contact_No, Verified) VALUES ('$first_name', '$last_name', '$password_app', '$email', '$contact', '0')";
         $sql2 = "INSERT INTO users (email, password, verified, Type) VALUES ('$email','$password_app','0', 'Applicant');";
         if (mysqli_query($db_server, $sql) && mysqli_query($db_server, $sql2)) {
            echo '<script type="text/javascript">
            $(document).ready(function(){
              $("#successModal").modal("show");
            });
            </script>';
         } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($db_server);
         }
      }
   
   }
} else {

   // Instalising Variables (Employer)
   $emailErr = $passwordErr = "";
   $name = $email = $contact = $password_emp = "";
   $comLogin = "";
   // Getting User Input from Registration Form (Employer)

   if ($_SERVER["REQUEST_METHOD"] == "POST") {

      $com_name = check_input($_REQUEST["company_name"]);

      $password_emp = check_input($_REQUEST['password_emp']);
      $password_emp = password_hash($password_emp, PASSWORD_DEFAULT);

      $com_email = check_input($_REQUEST['company_email']);
      $com_tel = check_input($_REQUEST['company_num']);

      $bsn = check_input($_REQUEST['company_bsn']);

      // Checking for Existing Employer (Email)
      $user_check_query = "SELECT * FROM employers WHERE com_email = '$com_email' LIMIT 1";

      $results = mysqli_query($db_server, $user_check_query);
      if (mysqli_num_rows($results) > 0) {

         $row = mysqli_fetch_assoc($results);

         if ($com_email == $row['com_email']) {

            $emailErr = "Email already exists";

         }
      } else {
         $sql = "INSERT INTO employers (com_name, com_email, com_password, com_bsn, com_tel, Verified) VALUES ('$com_name','$com_email','$password_emp','$bsn','$com_tel', '0')";
         $sql2 = "INSERT INTO users (email, password, verified, Type) VALUES ('$com_email','$password_emp','0','Employer');";
         if (mysqli_query($db_server, $sql) && mysqli_query($db_server, $sql2)) {
            $comLogin = "Successfully Created Account";
         } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($db_server);
         }
      }

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
