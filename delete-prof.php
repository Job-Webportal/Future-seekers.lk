<?php 
    require_once 'config.php';

    session_start();
    $mail = $_SESSION["name"];
    print $mail;
    if ($_SESSION["type"] === "Applicant") {
        
        $sql = "DELETE FROM `applicants` WHERE `Email` = '$mail'";
        mysqli_query($db_server, $sql);

        $sql2 = "DELETE FROM `users` WHERE `email` = '$mail'";
        mysqli_query($db_server, $sql2);

    } else {

        $sql = "DELETE FROM `employers` WHERE `com_email` = '$mail'";
        mysqli_query($db_server, $sql);

        $sql2 = "DELETE FROM `users` WHERE `email` = '$mail'";
        mysqli_query($db_server, $sql2);
    }


    session_unset();
    session_destroy();

?>
