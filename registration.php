<?php

require_once 'config.php';
require_once 'reg-script.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
   <!-- CSS only -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
   <link rel="stylesheet" href="css/CSS1.css">
</head>
<body>
   <div class="container-xxl reg-container">
      <div class="row justify-content-center">
         <div class="col-md-12 round-one">
            <!-- Employer Sign-up Form -->
            <div class="row justify-content-around">
               <div id="employer-info" class="col-4 log-emp ">
                  <div class="row d-flex justify-content-center">
                     <img src="images/hire1.webp" alt="">
                     <h5 class="line">Connect, Communicate and Cooperate to create a consistent Hiring Experience.</h5>
                     <button class="btn btn-primary btn-block" onclick="return show('seeker','employer','seeker-info','employer-info');">Seeking</button>
                  </div>
               </div>
               <div id="employer" class="col-8 reg-color">
               <h3 class="title">Employer Sign-Up Form</h3>
                  <div class="row register-form">
                     <div class="col-md-6">
                        <form id="reg-form-app" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method = "POST" autocomplete="off" novalidate="">
                           <div class="form-group">
                              <label>Company Name</label>
                              <input id = "com_name" type="text" class="form-control" name = "company_name" placeholder="New Castle" required/>
                              <p id="name_error"></p>
                           </div>
                           <div class="form-group">
                              <label>Password</label>
                              <input id = "password-emp" type = "password" name = "password_emp" class="form-control" placeholder="Password" required/>
                              <p id="pwd_error1"></p>
                           </div>
                           <div class="form-group">
                              <label>Tel. Number</label>
                              <input id = "tel-number" type = "text" name = "company_num" minlength="10" maxlength="10" class="form-control" placeholder="" onkeypress="return onlyNumberKey(event)" required/>
                              <p id="num_error"></p>
                           </div>
                     </div>
                     <div class="col-md-6">
                           <div class="form-group">
                              <label>Email Address</label>
                              <input id = "com_email" type = "text" name = "company_email" class="form-control" placeholder="newcastle@outlook.com" required/>
                              <p id="mail_error"></p>
                           </div>
                           <div class="form-group">
                              <label>Confirm Password</label>
                              <input id = "password-confirm1" type="password" class="form-control" name = "password_con2" placeholder="Re-enter Password" value="" />
                              <p id="con_error1"></p>
                           </div>
                           <div class="form-group">
                              <label>Business Registration No.</label>
                              <input id = "bsn" type = "text" name = "company_bsn" class="form-control" placeholder="X-00-X" value="" />
                              <p id="bsn_error"></p>
                           </div>
                     </div>
                     <div class="row">
                     <div class="form-check d-flex justify-content-center">
                        <label for="accept-terms">I Accept Terms &amp; Conditions </label>
                     </div>
                     </div> 
                     <div class="row sign-up">
                        <div class="col-md-12 d-flex justify-content-center">
                           <button id="empBtn" type="submit"><b> Sign Up </b></button>
                        </div>
                     </div>
                     </form>
                  </div>
               </div>
            </div>   
            <!-- Job Seeker Sign-up Form -->
            <div class="row justify-content-around">
               <div id="seeker-info" class="col-4 app-img">
               <div class="row d-flex justify-content-center">
                     <img src="images/seeking.webp" alt="">
                     <h5 class="line">The right place to express your career expectations and achieve them.</h5>
                     <button class="btn btn-primary btn-block" onclick="return show('employer','seeker','employer-info','seeker-info');">Hiring</button>
               </div>
               </div>
               <div id="seeker" class="col-8 reg-color">
               <h3 class="title">Applicant Sign-Up Form</h3>
                  <div class="row register-form">
                     <div class="col-md-6">
                        <form id="reg-form-emp" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method = "POST" autocomplete="off" novalidate="">
                           <div class="form-group">
                              <label>FirstName</label>
                              <input id = "fname" type="text" class="form-control" name = "firstname" placeholder="Tim"/>
                              <p id="fname_error"></p>
                           </div>
                           <div class="form-group">
                              <label>Password</label>
                              <input id = "password-app" type="text" class="form-control"  name = "password" placeholder="Password *"/>
                              <p id="pwd_error2"></p>
                           </div>
                           <div class="form-group">
                              <label>Email Address</label>
                              <input id = "Email2" type="email" class="form-control" name = "email" placeholder="timRobbins@gmail.com" />
                              <p id="mail_error2"></p>
                           </div>
                     </div>
                     <div class="col-md-6">
                           <div class="form-group">
                              <label>LastName</label>
                              <input id = "lname" type="text" class="form-control" name = "lastname" placeholder="Robbins" />
                              <p id="lname_error"></p>
                           </div>
                           <div class="form-group">
                              <label>Confirm Password</label>
                              <input id = "password-confirm2" type="text" class="form-control" name = "password_con1" placeholder="Re-enter Password" value="" />
                              <p id="con_error2"></p>
                           </div>
                           <div class="form-group">
                              <label>Contact Number</label>
                              <input id = "number" type="text" minlength="10" maxlength="10" name="contact" class="form-control" placeholder="" onkeypress="return onlyNumberKey(event)"/>
                              <p id="num_error1"></p>
                           </div>
                     </div>
                     <div class="row">
                     <div class="form-check d-flex justify-content-center">
                        <label for="accept-terms">I Accept Terms &amp; Conditions </label>
                     </div>
                     </div>
                     <div class="d-flex justify-content-center incorrect">
                        <?php echo $emailErr?>
                     </div>  
                     <div class="row sign-up">
                        <div class="col-md-12 d-flex justify-content-center">
                           <button id="appBtn" type="submit" class="button"><b> Sign Up </b></button>
                        </div>
                     </div>
                     </form>
                     <div class="d-flex justify-content-center incorrect">
                        <?php echo $comLogin?>
                     </div>  
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</body>
<script src="scripts/reg.js"></script>
<script>
   // Form Toggler Script 
   document.getElementById('seeker').style.display='none';
   document.getElementById('seeker-info').style.display='none';


   function show(shown, hidden, shown_pic, hidden_pic) {
   // Form
   document.getElementById(shown).style.display='block';
   document.getElementById(hidden).style.display='none';
   // Images 
   document.getElementById(shown_pic).style.display='block';
   document.getElementById(hidden_pic).style.display='none';
   return false;
   }
</script>
   <!-- Additional Javascrpit Libiraries  -->
   <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</html>
    