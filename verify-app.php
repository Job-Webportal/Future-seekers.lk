<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script><script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


<?php

    require_once 'config.php';

    $email = $_POST["email"];
    $verify_array = array();

    $sql = "SELECT * FROM applicants WHERE Email='$email'";
    $results = mysqli_query($db_server, $sql);

    if (mysqli_num_rows($results) == 1){

        while($row = mysqli_fetch_assoc($results))
        {
          $verify_array[] = $row;
        }

    }

?>

        <div class="card">
                <div class="row ">
                <?php 
                    foreach ($verify_array as $data){ 
                ?>
                    <div class="col">
                        <h6>FirstName :</h6>
                        <p><?php echo $data["Firstname"]; ?></p>
                    </div>
                    <div class="col">
                        <h6>LastName :</h6>
                        <p><?php echo $data["Lastname"]; ?></p>
                    </div>
                </div>
                <div class="row ">
                    <div class="col">
                        <h6>Email :</h6>
                        <p><?php echo $data["Email"]; ?></p>
                    </div>
                    <div class="col">
                        <h6>Contact :</h6>
                        <p><?php echo $data["Contact_No"]; ?></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <button type="button" class="verify" data-bs-dismiss="modal" data-num='1' data-email="<?php echo $data["Email"]; ?>">Accept</button>
                    </div>
                    <div class="col">
                        <button type="button" class="verify" data-bs-dismiss="modal" data-num='0' data-email="<?php echo $data["Email"]; ?>">Reject</button>
                    </div>
                </div>
                <?php } ?>
            </div>



<script>
        $(document).ready(function(){
          $('.verify').click(function(){
            let email = $(this).data('email');
            let num = $(this).data('num');
            console.log(email);
            $.ajax({
              url: 'verify-user.php',
              type: 'post',
              data: {email: email, num:num},
              success: function(response){
                console.log("email");
              }
            });
          });
        });
</script>
