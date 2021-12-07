
<?php

$db_hostname = 'localhost';
$db_database = 'application_users';
$db_username = 'root';
$db_password = '';

$db_server = mysqli_connect($db_hostname, $db_username, $db_password, $db_database);
if (!$db_server) die("Unable to connect to MySQL: " . mysqli_error());


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

$return_value = populateUserTable($db_server);


$applicant_verify = array();

  function populateVerifyAppTable($db_server, $applicant_verify){

    $sql = "SELECT Firstname, Email, created_at, Verified FROM applicants WHERE Verified='0'";
    $result = mysqli_query($db_server, $sql);

    while ($row = mysqli_fetch_assoc($result))
    {
      $applicant_verify[] = $row;
    }

    return $applicant_verify;

  }

  $return_app = populateVerifyAppTable($db_server, $applicant_verify);


  $employer_verify = array();

  function populateVerifyEmpTable($db_server, $employer_verify){

    $sql = "SELECT com_name, com_email, created_at, Verified FROM employers WHERE Verified='0'";
    $result = mysqli_query($db_server, $sql);

    while ($row = mysqli_fetch_assoc($result))
    {
      $employer_verify[] = $row;
    }

    return $employer_verify;

  }

  $return_emp = populateVerifyEmpTable($db_server, $employer_verify);










?>