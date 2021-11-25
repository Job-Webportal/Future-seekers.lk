<?php

    require_once 'config.php';

        function refreshTable(){
            
        $sql_app = "SELECT * FROM applicants";
        $sql_emp = "SELECT * FROM employers";

        $result = mysqli_query($db_server, $sql_app);
        
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $app_id = $row['id'];
                $app_Firstname = $row['Firstname'];
            }
        }

        $result = mysqli_query($db_server, $sql_emp);
        
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $emp_id = $row['id'];
                $emp_Name = $row['com_name'];
            }
        }
        }
        refreshTable();

        function verifyUser(){

            if (condition) {
                # code...
            }
        }
?>