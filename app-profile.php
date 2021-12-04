<?php

session_start();

$email = $_SESSION["name"];

require_once 'config.php';


function editAppProfile(){

  
  

}

function deleteAppProfile(){


  
}

function check_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
 }

?>