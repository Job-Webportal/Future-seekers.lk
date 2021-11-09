<?php


require_once 'config.php';
require_once 'function.php';


$email = $password = "";
$username_err = $password_err = $login_err = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){
  
  $email = check_input($_REQUEST["email"]);
  $password = check_input($_REQUEST["password"]);

  // Validate Crendentails
  $sql = "SELECT id, password FROM users WHERE Email='$email'";

  $results = mysqli_query($db_server, $sql);

  $row = mysqli_fetch_assoc($results);

  $hashed_password = $row["password"];

  if (password_verify($password, $hashed_password)) {
    
    session_start();

		$_SESSION['loggedin'] = TRUE;
    $_SESSION['id'] = $row["id"];
    $_SESSION['name'] = $email;

    header("location: index.php");
  } else {
    echo "Incorrect Password";
  }

}


  mysqli_close($db_server);

?>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login In</title>
</head>
<body>
    <form id="Login_Form" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method = "post">
        <label>Username  : </label>
        <input type = "text" name = "email" class = "box" required/><br /><br />

        <label>Password  : </label>
        <input type = "password" name = "password" class = "box"required/><br /><br />

        <input type = "submit" value = " LogIn "/>
    </form>
    <br>
    <a href="registration.php"> Don't have an account - Sign up</a>
</body>
</html>