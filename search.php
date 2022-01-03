
<?php 

require_once 'config.php';

session_start();

if(isset($_POST["action"])){
 
    
    if(isset($_POST["action"]) == 'sort') {    

        // $mystring = "WHERE";

        $sql = "SELECT `reference`, `Job_Title`, `Company`, `Job_Location`, `expiry`, `minimum_lkr`, `maximum_lkr` FROM `adverts` WHERE `status` = '1'";  

            if(isset($_POST['keywords']) && $_POST['keywords']!="") {
                $key = $_POST['keywords'];
                $sql.=" AND (`Job_Title` LIKE '%".$key."%' OR `Company` LIKE '%".$key."%')";
            }
        
            if(isset($_POST['locate']) && $_POST['locate']!="") {
                $locate = $_POST['locate'];
                $sql.=" AND `Job_Location` IN ('".$locate."')";
            }

            if(isset($_POST['salary']) && $_POST['salary']!="") {
                $salary = $_POST['salary'];
                $sql.=" AND `minimum_lkr` > ('".$salary."')";
            }

            if(isset($_POST['exp']) && $_POST['exp']!="") {
                $exp = $_POST['exp'];
                $sql.=" AND `Experience` IN ('".$exp."')";
            }

            if(isset($_POST['emp']) && $_POST['emp']!="") {
                $emp = $_POST['emp'];
                $sql.=" AND `Job_Type` IN ('".$emp."')";
            }

            if(isset($_POST['edu']) && $_POST['edu']!="") {
                $edu = $_POST['edu'];
                $sql.=" AND `Education` IN ('".$edu."')";
            }
            
            if(isset($_POST['category']) && $_POST['category']!="") {
                $category = $_POST['category'];
                $sql.=" AND `Job_Category` IN ('".$category."')";
            }

            if(isset($_POST['City']) && $_POST['City']!="") {
                $city = $_POST['City'];
                $sql.=" AND `City` IN ('".$city."')";
            }

            if(isset($_POST['prov']) && $_POST['prov']!="") {
                $prov = $_POST['prov'];
                $sql.=" AND `Province` IN ('".$prov."')";
            }

            postData($sql);
    
    }
} else {
    $sql = "SELECT `reference`, `Job_Title`, `Company`, `Job_Location`, `expiry`, `minimum_lkr`, `maximum_lkr` FROM `adverts` WHERE `status` = '1'";  
    postData($sql);
}



function postData($sql){
    include 'config.php';

    $results = mysqli_query($db_server, $sql);
    
    if(mysqli_num_rows($results)>0){
    
    while($row = mysqli_fetch_assoc($results))
    {
        $now = time();
        $your_date = strtotime($row["expiry"]);
        $datediff = $your_date - $now;
        $num = round($datediff / (60 * 60 * 24));
        if ($num > 5) {
          $icon = '<i class="bx bxs-bolt"></i>                      
                <p>Actively Hiring</p>';
        } else {
          $icon = '<i class="bx bxs-timer tim"></i>  
                <p>Urgently Hiring</p>';
        }

       echo '
       <div class="row d-flex justify-content-center">
            <div class="col-md-8 tile">			
                <div class="tile-head d-flex justify-content-between">
                    <div class="d-flex flex-column">
                        <h6>'.$row["Job_Title"].'</h6>
                        <p>'.$row["Company"].'</p>
                    </div>
                    <i class="bx bx-info-circle"></i>
                </div>
                <div class="tile-body">
                    <div class="tile-badge d-flex flex-row">
                    '.$icon.'
                    </div>
                    <div class="tile-salary rounded d-flex flex-row">
                        <i class="bx bxs-coin align-items-start"></i>                      
                        <p>LKR '.$row["minimum_lkr"].' - LKR '.$row["maximum_lkr"].' a month</p>  
                    </div>
                    <p class="tile-locate">Job Location : <span>'.$row["Job_Location"].'</span> </p>
                    <div class="tile-date">
                        Close Date : <span>'.$row["expiry"].'</span>
                    </div>
                </div>
                <div class="tile-foot d-flex justify-content-between">
                    <p class="">Click on <b>"View"</b> to see full job description</p>
                    <button class="view btn btn-primary" value="'.$row["reference"].'"><i class="bx bx-search-alt"></i>View</button>
                </div>
            </div>
        </div>
    '; 
    }    
    
    } else {
        echo "<p>No results found</p>";
    }

}


?>

<script>

let session = "<?php if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){ echo "null"; } else { echo $_SESSION['name']; } ?>";
let session1 = "<?php if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){ echo "null"; } else { echo $_SESSION['verified']; } ?>";
let session2 = "<?php if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){ echo "null"; } else { echo $_SESSION['type']; } ?>";

    $(document).ready(function(){
        $(".view").click(function(){
            let ref = $(this).val();
            let setid = true;
            let name = session;
            let type = session2;
            let verify = session1;
            $.ajax({
                type: 'POST',
                url: "view-job.php",
                data: {name:name, type:type, verify:verify, ref: ref, setid: setid},
                success: function(data, textStatus, jqXHR){
                    console.log(setid);
                    window.location = "view-job.php";
                },
            });
        });
    });

</script>