<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>

<?php


require_once 'config.php';


$email = $password = "";
$password_err = $login_err = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){
  
  $email = check_input($_REQUEST["email"]);
  $password = check_input($_REQUEST["password"]);

  // Validate Crendentails
  $sql = "SELECT `id`, `password`, `verified`, `Type` FROM users WHERE email='$email'";

  $results = mysqli_query($db_server, $sql);

    if (mysqli_num_rows($results) == 1) {

      $row = mysqli_fetch_assoc($results);
  
      if ($row["Type"] === "Administrator") {
        $hashed_password = password_hash($row["password"], PASSWORD_DEFAULT);
      } else {
        $hashed_password = $row["password"];
      }
    
      if (password_verify($password, $hashed_password)) {
        
          session_start();
      
          $_SESSION['loggedin'] = TRUE;
          $_SESSION['name'] = $email;
          $_SESSION['type'] = $row["Type"];
          $_SESSION['verified'] = $row["verified"];
          $_SESSION['ref'] = "";
      
          header("location: index.php");
      } else {
          echo '<script type="text/javascript">
                $(document).ready(function(){
                  $("#passwordModal").modal("show");
                });
                </script>';
      }

    } else {
      
      echo '<script type="text/javascript">
      $(document).ready(function(){
        $("#loginErrModal").modal("show");
      });
      </script>';

    }

}


  mysqli_close($db_server);
  
  function check_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
 }
 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login In</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/CSS1.css">
</head>
<body id="login-page">
  <section id="login">
		<div class="container-sm">
			<div class="row">
        <div class="col">
        <h4 class="text-center logo">Logo</h4>
            <h4 class="banner1 text-center "> <b>Get more things done with our platform.</b> </h4>
            <h5 class="banner2 text-center ">Access to the most powerful tool in the entire recruitment industry.</h5>
            <p class="title text-center ">Login</p>
              <form  class="" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" novalidate="">
                    <div class="form-group">
                      <label for="email">E-Mail Address</label>
                      <input id="Email" type="email" class="form-control" name="email" placeholder="name@email.com" required autofocus>
                      <i class="fas fa-check-circle"></i>
                      <p id= "mail_error"></p>
                    </div>
                    <div class="form-group">
                      <label for="password">Password</label>
                      <input id="password" type="password" class="form-control" name="password" placeholder="pass****" required>
                      <i class="fas fa-check-circle"></i>  
                      <p id= "pwd_error"></p>
                    </div>
                    <div class="form-group m-0 d-flex justify-content-center">
                      <button id="loginBtn" type="submit" class="btn btn-primary btn-block">
                        Login
                      </button>
                    </div>
                    <div class="mt-3 text-center flex-column">
                    <p class="mb-1"> Don't have an account? </p>
                    <a href="registration.php">Create One</a>
                    </div>
                </form>
					<div class="footer d-flex justify-content-center">
						Copyright &copy; 2022 &mdash; Magma 
					</div>

        </div>
			</div>
		</div>
	</section>
  <br>
  <!-- Password Error Modal -->
    <div class="modal fade" id="passwordModal" tabindex="-1" aria-labelledby="passwordModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-body">
            <div class="message d-flex flex-column align-items-center">
              <img src="images/sad.webp" alt="">
              <h3>Sorry! You may have to try again</h3>
              <p>Incorrect Password</p>
              </div>
            </div>   
            <div class="d-flex justify-content-center">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Try Again</button>
            </div>       
          </div>
      </div>
      </div>
    </div>

    <!-- Login Error Modal -->
    <div class="modal fade" id="loginErrModal" tabindex="-1" aria-labelledby="loginErrModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-body">
          <div class="message d-flex flex-column align-items-center">
             <img src="images/sad.webp" alt="">
             <h3>Sorry! You may have to try again</h3>
             <p>Email ID doesn't exist</p>
             </div>
          </div>
          <div class="d-flex justify-content-center">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Try Again</button>
          </div>
        </div>
      </div>
    </div>

</body>
    <script src="scripts/login.js"></script>
    <!-- Additional Javascrpit Libiraries  -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</html>


