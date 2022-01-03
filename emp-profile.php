<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>

<?php
      $n_mail = $email;
      require_once 'config.php';

      $user_array = array();
      $mailArray = array();

      $check_query = "SELECT `email` FROM `users`";
      $result = mysqli_query($db_server, $check_query);
  
      while($row = mysqli_fetch_assoc($result))
      {
        $mailArray[] = $row;
      }
      
      $sql = "SELECT * FROM employers WHERE com_email='$n_mail'";
      $results = mysqli_query($db_server, $sql);
    
        if (mysqli_num_rows($results) == 1){
  
          while($row = mysqli_fetch_assoc($results))
          {
            $user_array[] = $row;
          }
        }

      foreach ($user_array as $data) {
         $filelogo = $data["com_logo"];
         $filecover = $data["company_picture"];
         $fileadmin = $data["hr_picture"];
      }

      $tempname = $ctempname = $htempname = $folder = "";

      if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $com_name = check_input($_REQUEST ["edit-name"]);
        print $com_name;  
        $com_email = check_input($_REQUEST ['edit-email']);
        $com_tel = check_input($_REQUEST ['edit_tel']);
        $HR_Admin = check_input($_REQUEST ['edit-hrname']);
        $com_desc = check_input($_REQUEST ['edit-desc']);
        $com_size = check_input($_REQUEST ['edit-size']);
        $com_type = check_input($_REQUEST ['edit-type-business']);
        $com_model = check_input($_REQUEST ['edit-model']);
        $com_web = check_input($_REQUEST ['edit-web']);
        $com_employ = check_input($_REQUEST ['edit-employ']);
        $com_location = check_input($_REQUEST ['edit-location']);
        $com_service = check_input($_REQUEST ['edit-service']);
        $founded = check_input($_REQUEST ['edit-founded']);
        $vision = check_input($_REQUEST ['edit-vision']);
        $mission = check_input($_REQUEST ['edit-mission']);
        $hr_position = check_input($_REQUEST ['edit-hrposition']);
        $hr_mail = check_input($_REQUEST ['edit-hrmail']);

         // Upload Company Logo
         $filelogo = $_FILES["prof-logo"]["name"];
         $tempname = $_FILES["prof-logo"]["tmp_name"];    
         $folder = "pictures/logo/".$filelogo;  

         move_uploaded_file($tempname, $folder);

         // Upload Cover Picture
         $filecover = $_FILES["cover-picture"]["name"];
         $ctempname = $_FILES["cover-picture"]["tmp_name"];    
         $folder = "pictures/cover/".$filecover;
                  
         move_uploaded_file($ctempname, $folder);
                
         $fileadmin = $_FILES["hr_picture"]["name"];
         $htempname = $_FILES["hr_picture"]["tmp_name"];    
         $folder = "pictures/".$fileadmin;
                  
         move_uploaded_file($htempname, $folder);


         $sql = "UPDATE `employers` SET `com_name`='$com_name',`com_email`='$com_email',`com_web`='$com_web',`com_tel`='$com_tel',`location`='$com_location',`com_logo`='$filelogo',`company_picture`='$filecover',`HR_Admin`='$HR_Admin',`com_desc`='$com_desc',`com_service`='$com_service',`com_size`='$com_size',`com_type`='$com_type',`com_model`='$com_model',`com_employ`='$com_employ',`founded`='$founded',`vision`='$vision',`mission`='$mission',`hr_position`='$hr_position',`hr_mail`='$hr_mail',`hr_picture`='$fileadmin' WHERE `com_email` = '$n_mail'";
         $sql2 = "UPDATE `users` SET `email`='$com_email' WHERE `email` ='$n_mail'";
           
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

