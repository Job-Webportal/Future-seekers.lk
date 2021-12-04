<?php 

    session_start();

    $email = $_SESSION["name"];


    $sql = "DELETE * FROM employers WHERE com_email = '$email'";
    $results = mysqli_query($db_server, $sql);

    $sql2 = "DELETE * FROM users WHERE email = '$email'";
    $results2 = mysqli_query($db_server, $sql2);

    header("location: test.htm");



?>