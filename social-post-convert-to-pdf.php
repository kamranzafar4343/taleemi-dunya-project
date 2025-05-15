<?php 
include("functions/db.php"); 
require('compose/autoload.php');

if (isset($_GET['id'])){
    
   $ids = $_GET['id'];
   $inst = $_GET['inst'];

$sl_schol = mysqli_query($con,"select * from confirmSchools where institute_id='$inst'");
$rt = mysqli_fetch_assoc($sl_schol);
$institute_name = $rt['institute_name'];
$campus = $rt['campus'];
$logo = $rt['logo'];


$selct_socla = mysqli_query($con,"select * from socialPost where id='$ids'");
if(mysqli_num_rows($selct_socla)>0){
    while($frms = mysqli_fetch_array($selct_socla)){
        $post_name = $frms['post_name'];
$html = '<div align="center">
<h1 style="text-transform:uppercase;margin:0px;text-align:center;font-family:verdana;">'.$institute_name.'</h1>
    <img src="portal-admins/social-post/'.$post_name.'" width="100%">
</div>';
    }
}else{
    $html = "Student Record is not Exist.";    
}
$mpdf=new \Mpdf\Mpdf();
$mpdf->WriteHTML($html);
$file=time().'.pdf';
$mpdf->output($file,'D');
    }
?>