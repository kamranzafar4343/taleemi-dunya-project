<?php
require_once("../functions/db.php");
$clased = $_POST['clased'];
$sectned = $_POST['sectned'];
$sesned = $_POST['sesned'];
$instCdeed = $_POST['instCdeed'];
$crd = 1; 

$sl_ftch = mysqli_query($con,"select * from addStudents where instituteId LIKE '%$instCdeed%' && class LIKE '%$clased%' && section LIKE '%$sectned%' && session LIKE '%$sesned%'");
$fuls = "";
if(mysqli_num_rows($sl_ftch)>0){
    $fuls = "<table class='table table-responsive table-striped w-100 bg-white'><thead><tr><th>Sr#</th><th width='20'>Image</th><th>Student Name</th><th>Class</th><th>Section</th><th>Session</th><th>Card#</th><th>Action</th></tr></thead>";
    while($crd <= 100000 && $results = mysqli_fetch_array($sl_ftch)){
    $ids = $results['id'];
    $frmsimage = $results['image'];
    $studentName = $results['studentName'];
    $class = $results['class'];
    $section = $results['section'];
    $session = $results['session'];
    $digitalCard = $results['digitalCard'];
$fuls .= "<tr><td>".$crd++."</td><td width='20'><img src='../student_imgs/".$frmsimage."' class='img-fluid'></td><td class='text-capitalize'>".$studentName."</td><td class='text-uppercase'>".$class."</td><td class='text-uppercase'>".$section."</td><td>".$session."</td><td>".$digitalCard."</td><td><a href='edit-card-number?id=".$ids."' target='_blank'><i class='fa-regular fa-id-card text-primary'></i></a></td></tr>";
?>
<?php
    }    
$fuls .= "</table>";
mysqli_close($con);
echo $fuls;
}else{ echo "<div class='alert alert-danger text-capitlaize'>there are no record found!</div>"; }
?>

