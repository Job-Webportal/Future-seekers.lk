<?php


require_once 'config.php';
require_once 'functions.php';

// if (condition) {
//   # code...
// }

$email = $password = "";
$password_err = $login_err = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){
  
  $email = check_input($_REQUEST["email"]);
  $password = check_input($_REQUEST["password"]);

  // Validate Crendentails
  $sql = "SELECT id, password, Type FROM users WHERE email='$email'";

  $results = mysqli_query($db_server, $sql);

    if (mysqli_num_rows($results) === 1) {

      $row = mysqli_fetch_assoc($results);
  
      if ($row["Type"] === "Administrator") {
        $hashed_password = password_hash($row["password"], PASSWORD_DEFAULT);
      } else {
        $hashed_password = $row["password"];
      }
    
      if (password_verify($password, $hashed_password)) {
        
          session_start();
      
          $_SESSION['loggedin'] = TRUE;
          $_SESSION['id'] = $row["id"];
          $_SESSION['name'] = $email;
          $_SESSION['type'] = $row["Type"];
      
          header("location: index.php");
      } else {
          $password_err = "Incorrect Password";
      }

    } else {
      
      $login_err = "Email ID Doesn't Exists";
  
    }

}


  



  mysqli_close($db_server);

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
<body>
<section class="h-100 my-login">
		<div class="container h-100">
			<div class="row justify-content-md-center h-100">
				<div class="card-wrapper">
					<div class="card fat">
						<div class="card-body">
              <h4 class="card-title">Login</h4>
              <div class="row d-flex justify-content-around">
                <div class="col-4 login-circle">
                  <img src="images/Seeker_login.png" alt="">
                  <h6>Seeker</h6>
                </div>
                <div class="col-4 login-circle">
                  <img src="images/Employer_login.png" alt="">
                  <h6>Employer</h6>
                </div>
              </div>
							<form id="login" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" class="needs-validation" novalidate>
								<div class="form-group">
									<label for="email">E-Mail Address</label>
									<input id="Email" type="email" class="form-control" name="email" placeholder="name@email.com" required autofocus>
									<p id= "mail_error"></p>
								</div>

								<div class="form-group">
									<label for="password">Password</label>
									<input id="password" type="password" class="form-control" name="password" placeholder="Password" required data-eye>
								    <p id= "pwd_error"></p>
                </div>

								<div class="form-group m-0">
									<button id="loginBtn" type="submit" class="btn btn-primary btn-block" data-bs-toggle="modal" data-bs-target="#loginModal">
										Login
									</button>
								</div>
								<div class="mt-4 text-center">

									Don't have an account? <a href="registration.php">Create One</a>
								</div>
							</form>
						</div>
					</div>
					<div class="footer">
						Copyright &copy; 2021 &mdash; Magma 
					</div>
				</div>
			</div>
		</div>
	</section>
  <br>
    <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <?php echo $password_err; ?>
            <?php echo $login_err; ?>
          </div>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Try Again</button>
        </div>
      </div>
    </div>
</body>
    <script src="scripts/login.js"></script>
    <!-- Additional Javascrpit Libiraries  -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</html>