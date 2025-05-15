<?php
require_once("../functions/db.php");

$instut_ids = $_POST['instut_ids'];
$cdr = 1;
$slel = mysqli_query($con,"select * from addStaff where instituteId='$instut_ids'");
$finl = ""; 
if(mysqli_num_rows($slel)>0){
$finl = "<table class='table table-responsive table-striped w-100'><tr><th>Sr#</th><th width='20'>Image</th><th>Name</th><th>Post</th><th>Type</th><th>Session</th><th>Card#</th><th>Action</th></tr>";    
    while($cdr <= 100000 && $crdftch = mysqli_fetch_array($slel)){
        $ides = $crdftch['id'];
        if(!empty($crdftch['staffimage'])){ $staffimage = $crdftch['staffimage']; }else{ $staffimage = "users.jpg"; }
        $ids = $crdftch['id'];
        $staffName = $crdftch['staffName'];
        $appliedPost = $crdftch['appliedPost'];
        $staffType = $crdftch['staffType'];
        $session = $crdftch['session'];
        $digitalCard = $crdftch['digitalCard'];
$finl .= "<tr><td>".$cdr++."</td><td width='20'><img src='../staff_imgs/".$staffimage."' class='img-fluid'></td><td class='text-capitalize'>".$staffName."</td><td>".$appliedPost."</td><td>".$staffType."</td><td>".$session."</td><td>".$digitalCard."</td><td><a href='assign-card-to-staff?id=".$ids."'><i class='fa-solid fa-id-card text-primary'></i></a></td></tr>";        
    }
$finl .= "</table>";
mysqli_close($con);
echo $finl;
}else{ echo "<div class='alert alert-danger text-capitalize'>there are no record found!</div>"; }
?>