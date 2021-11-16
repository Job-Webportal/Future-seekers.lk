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
   <link rel="stylesheet" href="css/style.css">
</head>
<body onload="checkForm()">
   <div class="container reg-container">
      <div class="row justify-content-center">
         <div class="col-12 round-one">
            <div class="row reg-bar">
               <div class="col-sm-1 reg-img">
                  <img src="images/businessman.png" alt="">
               </div>
               <div class="col-5 reg-col">
               <a href="#" onclick="return show('seeker','employer','seeker-info','employer-info');">I am Seeking</a>
               </div>
               <div class="col-5 reg-col">
               <a class="text-end" href="#" onclick="return show('employer','seeker','employer-info','seeker-info');">I am Hiring</a>
               </div>
               <div class="col-sm-1 align-self-right reg-img">
                  <img class="" src="images/cv.png" alt="">
               </div>
            </div>
            <!-- Employer Sign-up Form -->
            <div class="row justify-content-around">
               <div id="employer-info" class="col-4 log-emp">
                  <img src="images/6685.jpg" alt="">
               </div>
               <div id="employer" class="col-8 reg-color">
                  <div class="row register-form">
                     <div class="col-md-6">
                        <form id="Reg_form_App" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method = "POST">
                           <div class="form-group">
                              <label>Company Name</label>
                              <input id = "com_name" type="text" class="form-control" name = "company_name" placeholder="New Castle" required/>
                              <p class="name_error"></p>
                           </div>
                           <div class="form-group">
                              <label>Password</label>
                              <input id = "password_emp" type = "password" name = "password_emp" class="form-control" placeholder="Password" required/>
                              <p class="pwd_error"></p>
                           </div>
                           <div class="form-group">
                              <label>Tel. Number</label>
                              <input id = "com_number" type = "text" name = "company_num" minlength="10" maxlength="10" class="form-control" placeholder="" required/>
                              <p class="mail_error"></p>
                           </div>
                     </div>
                     <div class="col-md-6">
                           <div class="form-group">
                              <label>Email Address</label>
                              <input id = "com_email" type = "text" name = "company_email" class="form-control" placeholder="newcastle@outlook.com" required/>
                              <p class="mail_error"></p>
                           </div>
                           <div class="form-group">
                              <label>Confirm Password</label>
                              <input id = "password-confirm2" type="password" class="form-control" name = "password_con2" placeholder="Re-enter Password" value="" />
                              <p class="con1_error"></p>
                           </div>
                           <div class="form-group">
                              <label>Business Registration No.</label>
                              <input id = "bsn" type = "text" name = "company_bsn" class="form-control" placeholder="X-00-X" value="" />
                              <p class="num_error"></p>
                           </div>
                     </div>
                     <div class="row">
                     <div class="form-check d-flex justify-content-center">
                        <input type="checkbox" name="checkbox" id="accept-terms" class="form-check-input">
                        <label for="accept-terms">Accept Terms &amp; Conditions </label>
                        <p id= "msg-agree"></p>
                     </div>
                     </div>
                     <div class="d-flex justify-content-center incorrect">
                        <?php echo $emailErr?>
                     </div>  
                     <div class="row sign-up">
                        <div class="col-md-12 d-flex justify-content-center">
                           <button type="submit" class="button"><b> Sign Up </b></button>
                        </div>
                     </div>
                     </form>
                     <div class="d-flex justify-content-center incorrect">
                        <?php echo $comLogin?>
                     </div>  
                  </div>
               </div>
            </div>   
            <!-- Job Seeker Sign-up Form -->
            <div class="row justify-content-around">
               <div id="seeker-info" class="col-4 app-img">
                  <img  src="images/8401.jpg" alt="">
               </div>
               <div id="seeker" class="col-8 reg-color">
                  <div  class="row register-form">
                     <div class="col-md-6">
                        <form id="Reg_form_App" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method = "POST">
                           <div class="form-group">
                              <label>FirstName</label>
                              <input id = "fname" type="text" class="form-control" name = "firstname" placeholder="Tim" value="" />
                              <p class="name_error"></p>
                           </div>
                           <div class="form-group">
                              <label>Password</label>
                              <input id = "password_app" type="password" class="form-control"  name = "password" placeholder="Password *" value="" />
                              <p class="pwd_error"></p>
                           </div>
                           <div class="form-group">
                              <label>Email Address</label>
                              <input id = "Email" type="email" class="form-control" name = "email" placeholder="timRobbins@gmail.com" value="" />
                              <p class="mail_error"></p>
                           </div>
                     </div>
                     <div class="col-md-6">
                           <div class="form-group">
                              <label>LastName</label>
                              <input id = "lname" type="text" class="form-control" name = "lastname" placeholder="Robbins" value="" />
                              <p class="name_error"></p>
                           </div>
                           <div class="form-group">
                              <label>Confirm Password</label>
                              <input id = "password-confirm1" type="password" class="form-control" name = "password_con1" placeholder="Re-enter Password" value="" />
                              <p class="con1_error"></p>
                           </div>
                           <div class="form-group">
                              <label>Contact Number</label>
                              <input id = "c_number" type="text" minlength="10" maxlength="10" name="contact" class="form-control" placeholder="" value="" />
                              <p class="num_error"></p>
                           </div>
                     </div>
                     <div class="row">
                     <div class="form-check d-flex justify-content-center">
                        <input type="checkbox" name="checkbox" id="accept-terms" class="form-check-input">
                        <label for="accept-terms">Accept Terms &amp; Conditions </label>
                        <p id= "msg-agree"></p>
                     </div>
                     </div>
                     <div class="d-flex justify-content-center incorrect">
                        <?php echo $emailErr?>
                     </div>  
                     <div class="row sign-up">
                        <div class="col-md-12 d-flex justify-content-center">
                           <button type="submit" class="button"><b> Sign Up </b></button>
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
   <script>
  document.getElementById("seeker").style.display='none';
  document.getElementById("seeker-info").style.display='none';


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

<!-- <br>
      <a href="#" onclick="return show('employer','seeker');">Hiring</a>
      <br>
      <a href="#" onclick="return show('seeker','employer');">Seeking</a> -->

      