<?php
    require_once 'config.php';

    $email = $_POST["email"];
    $num = $_POST["num"];


    if ($num == '1') {

        $sql = "UPDATE users SET verified = '1' WHERE email='$email'";
        $results = mysqli_query($db_server, $sql);

        $sql2 = "SELECT * FROM users WHERE email='$email'";
        $results2 = mysqli_query($db_server, $sql2);

        if (mysqli_num_rows($results2) == 1){
            $row = mysqli_fetch_assoc($results2);


            if ($row["Type"] === "Employer") {
                $sql3 = "UPDATE employers SET Verified='1' WHERE com_email='$email'";
                $results3 = mysqli_query($db_server, $sql3);
            
    
            } else {
                print "pass";

                $sql4 = "UPDATE applicants SET Verified='1' WHERE Email='$email'";
                $results4 = mysqli_query($db_server, $sql4);
    
            }

            $return_value = populateUserTable($db_server);

        }


        
    } else {
        print "fail";
    }

    $user_array = array();

    function populateUserTable($db_server){

        $sql = "SELECT id, email, verified, Type FROM users";
        $result = mysqli_query($db_server, $sql);
        
        while($row = mysqli_fetch_assoc($result))
        {
        $user_array[] = $row;
        }
        return $user_array;
    }

?>