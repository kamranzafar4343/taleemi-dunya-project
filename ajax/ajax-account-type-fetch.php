<?php
require_once("../functions/db.php");

$instut_id = $_POST['instut_id'];

$sl_types = mysqli_query($con,"select * from accounts_type where instituteId='$instut_id'");
$fuls = "<option class='text-capitalize' value='None'>---select account type---</option>";
if(mysqli_num_rows($sl_types)>0){
    while($result = mysqli_fetch_array($sl_types)){
        $type_name = $result['type_name'];
        $fuls .= "<option>".$type_name."</option>";
    }
    echo $fuls; 
}else{
    echo "";
}

?>