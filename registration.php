<?php

   require_once 'config.php';
   require_once 'function.php';

   //
   $nameErr = $emailErr = $contactErr = $passwordErr = "";
   $name = $email = $contact = $password = "";

   // Getting User Input from Registration Form

   if ($_SERVER["REQUEST_METHOD"] == "POST") {

      $first_name = check_input($_REQUEST["firstname"]);

      $last_name = check_input($_REQUEST['lastname']);

      $password = check_input($_REQUEST['password']);
      $password = password_hash($password, PASSWORD_DEFAULT);

      $email = $_REQUEST['email'];

      $contact = $_REQUEST['contact'];

      $education = check_input($_REQUEST['education']);

      // Checking for Existing User
      $user_check_query = "SELECT * FROM users WHERE Email= '$email' LIMIT 1";

      $results = mysqli_query($db_server, $user_check_query);
      $user = mysqli_fetch_assoc($results);

      if ($user["Email"] === $email) {
         $emailErr = "Email Already Exists";
      } else {
         $sql = "INSERT INTO users (firstname, Lastname, password, Email, Contact_No, Eductaion) VALUES ('$first_name', '$last_name', '$password', '$email', '$contact', '$education')";

         if (mysqli_query($db_server, $sql)) {
            echo "New record created successfully";
         } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($db_server);
         }
      }


   }

   $db_server->close();

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
</head>
<body>
      <div>
         Sign Up
      </div>
      <br>
      <form id="Reg_form" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method = "post">

            <label>FirstName  : </label>
            <input type = "text" name = "firstname" class = "box" required/><br /><br />
            
            <label>LastName  :  </label>
            <input type = "text" name = "lastname" class = "box" required/><br /><br />

            <label>Password  :  </label>
            <input type = "password" name = "password" class = "box" required/><br/><br />

            <label>Email Address  :  </label>
            <input type = "text" name = "email" class = "box" required/><br/><br />

            <label>Contact Number  :  </label>
            <input type = "text" name = "contact" class = "box" required/><br/><br />

            <label>Education  :  </label>
            <input type = "text" name = "education" class = "box" required/><br/><br />

            <input type = "submit" value = "Submit "/><br />
            <br>

            <a href="login.php">Click Here to Log In</a>
                  <!-- CSS for User Already Exists (To be Done)-->
      </form>
   </body>
</html>
